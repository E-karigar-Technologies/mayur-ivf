<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GalleryModel;
use App\Models\CategoryModel;

class Gallery extends BaseController
{
    public function index()
    {
        $galleryModel = new GalleryModel();
        $typeFilter   = $this->request->getGet('type');

        $builder = $galleryModel->orderBy('sort_order', 'ASC')->orderBy('id', 'DESC');
        if (!empty($typeFilter) && in_array($typeFilter, ['image', 'video'])) {
            $builder->where('type', $typeFilter);
        }

        $items = $builder->findAll();

        $stats = [
            'total'  => $galleryModel->countAllResults(false),
            'images' => (new GalleryModel())->where('type', 'image')->countAllResults(false),
            'videos' => (new GalleryModel())->where('type', 'video')->countAllResults(false),
            'active' => (new GalleryModel())->where('is_active', 1)->countAllResults(false),
        ];

        $data = [
            'title'       => 'Media Gallery CMS | Mayor\'s IVF Admin',
            'items'       => $items,
            'stats'       => $stats,
            'typeFilter'  => $typeFilter ?? 'all',
        ];

        return view('admin/gallery/index', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getActiveNames();

        // Include default gallery categories if not already present
        $defaultCats = ['Clinic & Labs', 'Procedures', 'Success Moments', 'Patient Stories', 'Equipment'];
        $categories = array_values(array_unique(array_merge($categories, $defaultCats)));

        $data = [
            'title'      => 'Upload Media to Gallery | Mayor\'s IVF Admin',
            'categories' => $categories,
        ];

        return view('admin/gallery/create', $data);
    }

    public function store()
    {
        $type = $this->request->getPost('type') ?? 'image';

        $rules = [
            'title'    => 'required|min_length[3]|max_length[255]',
            'type'     => 'required|in_list[image,video]',
            'category' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title       = trim($this->request->getPost('title'));
        $category    = trim($this->request->getPost('category'));
        $description = trim($this->request->getPost('description') ?? '');
        $sortOrder   = (int) ($this->request->getPost('sort_order') ?? 0);
        $isActive    = $this->request->getPost('is_active') ? 1 : 0;

        $fileUrl        = null;
        $thumbnailUrl   = null;
        $videoSource    = null;
        $videoEmbedUrl  = null;

        // Ensure upload directory exists
        $uploadPath = FCPATH . 'uploads/gallery';
        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        if ($type === 'image') {
            // Handle image file upload
            $imgFile = $this->request->getFile('image_file');
            if ($imgFile && $imgFile->isValid() && ! $imgFile->hasMoved()) {
                $newName = $imgFile->getRandomName();
                $imgFile->move($uploadPath, $newName);
                $fileUrl = base_url('uploads/gallery/' . $newName);
                $thumbnailUrl = $fileUrl;
            } else {
                // Fallback to URL input
                $fileUrl = trim($this->request->getPost('image_url') ?? '');
                $thumbnailUrl = $fileUrl;
            }

            if (empty($fileUrl)) {
                return redirect()->back()->withInput()->with('error', 'Please upload an image file or provide an image URL.');
            }
        } else {
            // Video Type
            $videoInputType = $this->request->getPost('video_input_type') ?? 'youtube';

            if ($videoInputType === 'upload') {
                $vidFile = $this->request->getFile('video_file');
                if ($vidFile && $vidFile->isValid() && ! $vidFile->hasMoved()) {
                    $newName = $vidFile->getRandomName();
                    $vidFile->move($uploadPath, $newName);
                    $fileUrl = base_url('uploads/gallery/' . $newName);
                    $videoSource = 'upload';
                    $videoEmbedUrl = $fileUrl;
                } else {
                    return redirect()->back()->withInput()->with('error', 'Please select a valid video file to upload.');
                }
            } else {
                // YouTube or External URL
                $rawUrl = trim($this->request->getPost('video_url') ?? '');
                if (empty($rawUrl)) {
                    return redirect()->back()->withInput()->with('error', 'Please enter a video URL.');
                }

                $fileUrl = $rawUrl;
                $videoData = $this->parseVideoUrl($rawUrl);
                $videoSource    = $videoData['source'];
                $videoEmbedUrl  = $videoData['embed_url'];
                $thumbnailUrl   = $videoData['thumbnail_url'];
            }

            // Custom video thumbnail upload if provided
            $thumbFile = $this->request->getFile('thumbnail_file');
            if ($thumbFile && $thumbFile->isValid() && ! $thumbFile->hasMoved()) {
                $thumbName = $thumbFile->getRandomName();
                $thumbFile->move($uploadPath, $thumbName);
                $thumbnailUrl = base_url('uploads/gallery/' . $thumbName);
            } elseif (!empty($this->request->getPost('custom_thumbnail_url'))) {
                $thumbnailUrl = trim($this->request->getPost('custom_thumbnail_url'));
            }

            if (empty($thumbnailUrl)) {
                $thumbnailUrl = 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?w=600&h=400&fit=crop&auto=format';
            }
        }

        $galleryModel = new GalleryModel();
        $galleryModel->insert([
            'title'           => $title,
            'type'            => $type,
            'file_url'        => $fileUrl,
            'thumbnail_url'   => $thumbnailUrl,
            'video_source'    => $videoSource,
            'video_embed_url' => $videoEmbedUrl,
            'category'        => $category,
            'description'     => $description,
            'sort_order'      => $sortOrder,
            'is_active'       => $isActive,
        ]);

        return redirect()->to(base_url('admin/gallery'))->with('success', "Media '{$title}' added to gallery successfully!");
    }

    public function edit(int $id)
    {
        $galleryModel = new GalleryModel();
        $item = $galleryModel->find($id);

        if (! $item) {
            return redirect()->to(base_url('admin/gallery'))->with('error', 'Gallery item not found.');
        }

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getActiveNames();
        $defaultCats = ['Clinic & Labs', 'Procedures', 'Success Moments', 'Patient Stories', 'Equipment'];
        $categories = array_values(array_unique(array_merge($categories, $defaultCats)));

        $data = [
            'title'      => 'Edit Gallery Item: ' . $item['title'],
            'item'       => $item,
            'categories' => $categories,
        ];

        return view('admin/gallery/edit', $data);
    }

    public function update(int $id)
    {
        $galleryModel = new GalleryModel();
        $item = $galleryModel->find($id);

        if (! $item) {
            return redirect()->to(base_url('admin/gallery'))->with('error', 'Gallery item not found.');
        }

        $rules = [
            'title'    => 'required|min_length[3]|max_length[255]',
            'type'     => 'required|in_list[image,video]',
            'category' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $type        = $this->request->getPost('type') ?? $item['type'];
        $title       = trim($this->request->getPost('title'));
        $category    = trim($this->request->getPost('category'));
        $description = trim($this->request->getPost('description') ?? '');
        $sortOrder   = (int) ($this->request->getPost('sort_order') ?? 0);
        $isActive    = $this->request->getPost('is_active') ? 1 : 0;

        $fileUrl        = $item['file_url'];
        $thumbnailUrl   = $item['thumbnail_url'];
        $videoSource    = $item['video_source'];
        $videoEmbedUrl  = $item['video_embed_url'];

        $uploadPath = FCPATH . 'uploads/gallery';
        if (! is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        if ($type === 'image') {
            $imgFile = $this->request->getFile('image_file');
            if ($imgFile && $imgFile->isValid() && ! $imgFile->hasMoved()) {
                $newName = $imgFile->getRandomName();
                $imgFile->move($uploadPath, $newName);
                $fileUrl = base_url('uploads/gallery/' . $newName);
                $thumbnailUrl = $fileUrl;
            } elseif (!empty($this->request->getPost('image_url'))) {
                $fileUrl = trim($this->request->getPost('image_url'));
                $thumbnailUrl = $fileUrl;
            }
        } else {
            $vidFile = $this->request->getFile('video_file');
            if ($vidFile && $vidFile->isValid() && ! $vidFile->hasMoved()) {
                $newName = $vidFile->getRandomName();
                $vidFile->move($uploadPath, $newName);
                $fileUrl = base_url('uploads/gallery/' . $newName);
                $videoSource = 'upload';
                $videoEmbedUrl = $fileUrl;
            } elseif (!empty($this->request->getPost('video_url'))) {
                $rawUrl = trim($this->request->getPost('video_url'));
                $fileUrl = $rawUrl;
                $videoData = $this->parseVideoUrl($rawUrl);
                $videoSource    = $videoData['source'];
                $videoEmbedUrl  = $videoData['embed_url'];
                if (empty($thumbnailUrl) || strpos($thumbnailUrl, 'youtube') !== false) {
                    $thumbnailUrl = $videoData['thumbnail_url'];
                }
            }

            // Custom thumbnail upload
            $thumbFile = $this->request->getFile('thumbnail_file');
            if ($thumbFile && $thumbFile->isValid() && ! $thumbFile->hasMoved()) {
                $thumbName = $thumbFile->getRandomName();
                $thumbFile->move($uploadPath, $thumbName);
                $thumbnailUrl = base_url('uploads/gallery/' . $thumbName);
            } elseif (!empty($this->request->getPost('custom_thumbnail_url'))) {
                $thumbnailUrl = trim($this->request->getPost('custom_thumbnail_url'));
            }
        }

        $galleryModel->update($id, [
            'title'           => $title,
            'type'            => $type,
            'file_url'        => $fileUrl,
            'thumbnail_url'   => $thumbnailUrl,
            'video_source'    => $videoSource,
            'video_embed_url' => $videoEmbedUrl,
            'category'        => $category,
            'description'     => $description,
            'sort_order'      => $sortOrder,
            'is_active'       => $isActive,
        ]);

        return redirect()->to(base_url('admin/gallery'))->with('success', "Media '{$title}' updated successfully!");
    }

    public function toggleStatus(int $id)
    {
        $galleryModel = new GalleryModel();
        $item = $galleryModel->find($id);

        if (! $item) {
            return redirect()->to(base_url('admin/gallery'))->with('error', 'Item not found.');
        }

        $newStatus = $item['is_active'] ? 0 : 1;
        $galleryModel->update($id, ['is_active' => $newStatus]);

        $statusLabel = $newStatus ? 'Activated' : 'Hidden';
        return redirect()->to(base_url('admin/gallery'))->with('success', "Item {$statusLabel} on public website.");
    }

    public function delete(int $id)
    {
        $galleryModel = new GalleryModel();
        $item = $galleryModel->find($id);

        if (! $item) {
            return redirect()->to(base_url('admin/gallery'))->with('error', 'Gallery item not found.');
        }

        // Remove local file if uploaded
        if (!empty($item['file_url']) && strpos($item['file_url'], base_url('uploads/gallery/')) === 0) {
            $filename = str_replace(base_url('uploads/gallery/'), '', $item['file_url']);
            $filePath = FCPATH . 'uploads/gallery/' . $filename;
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }

        $galleryModel->delete($id);

        return redirect()->to(base_url('admin/gallery'))->with('success', "Media item '{$item['title']}' deleted successfully.");
    }

    private function parseVideoUrl(string $url): array
    {
        $embedUrl = $url;
        $thumbUrl = 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?w=600&h=400&fit=crop&auto=format';
        $source = 'external';

        // YouTube regex
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $url, $match)) {
            $youtubeId = $match[1];
            $embedUrl  = "https://www.youtube.com/embed/{$youtubeId}";
            $thumbUrl  = "https://img.youtube.com/vi/{$youtubeId}/hqdefault.jpg";
            $source    = 'youtube';
        } elseif (preg_match('/vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)/i', $url, $match)) {
            $vimeoId  = $match[3];
            $embedUrl = "https://player.vimeo.com/video/{$vimeoId}";
            $source   = 'vimeo';
        }

        return [
            'source'        => $source,
            'embed_url'     => $embedUrl,
            'thumbnail_url' => $thumbUrl,
        ];
    }
}
