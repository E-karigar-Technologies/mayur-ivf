<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table            = 'gallery';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'title',
        'type',             // 'image' or 'video'
        'file_url',         // image / video source url
        'thumbnail_url',     // video poster / thumbnail
        'video_source',     // 'upload', 'youtube', 'vimeo', 'external'
        'video_embed_url',  // iframe embed URL
        'category',         // e.g. 'Clinic & Labs', 'Procedures', 'Success Moments', 'Patient Stories'
        'description',
        'sort_order',
        'is_active',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getActiveGallery(?string $category = null): array
    {
        try {
            $builder = $this->where('is_active', 1);

            if (!empty($category) && strtolower($category) !== 'all') {
                if (strtolower($category) === 'videos') {
                    $builder->where('type', 'video');
                } elseif (strtolower($category) === 'photos' || strtolower($category) === 'images') {
                    $builder->where('type', 'image');
                } else {
                    $builder->where('category', $category);
                }
            }

            $results = $builder->orderBy('sort_order', 'ASC')->orderBy('id', 'DESC')->findAll();
            if (!empty($results)) {
                return $results;
            }
        } catch (\Throwable $e) {
            // fallback
        }

        return $this->getStaticGallery($category);
    }

    public function getAllItems(): array
    {
        try {
            return $this->orderBy('sort_order', 'ASC')->orderBy('id', 'DESC')->findAll();
        } catch (\Throwable $e) {
            return $this->getStaticGallery();
        }
    }

    public function getCategories(): array
    {
        try {
            $dbCats = $this->select('category')->distinct()->findAll();
            if (!empty($dbCats)) {
                $cats = array_unique(array_filter(array_column($dbCats, 'category')));
                return array_values(array_unique(array_merge(['All', 'Photos', 'Videos'], $cats)));
            }
        } catch (\Throwable $e) {
            // fallback
        }

        return ['All', 'Photos', 'Videos', 'Clinic & Labs', 'Procedures', 'Success Moments'];
    }

    public function getStaticGallery(?string $category = null): array
    {
        $items = [
            [
                'id'              => 1,
                'title'           => 'Advanced IVF & Embryology Laboratory',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Our state-of-the-art cleanroom embryology laboratory equipped with modern micromanipulators and laser hatching technology.',
                'sort_order'      => 1,
                'is_active'       => 1,
            ],
            [
                'id'              => 2,
                'title'           => 'Inside Mayor\'s IVF Centre: Patient Journey & Care',
                'type'            => 'video',
                'file_url'        => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?w=600&h=400&fit=crop&auto=format',
                'video_source'    => 'youtube',
                'video_embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'category'        => 'Success Moments',
                'description'     => 'A guided walk-through of Dr. Meetu Bhushan\'s personalized consultation process and compassionate reproductive care.',
                'sort_order'      => 2,
                'is_active'       => 1,
            ],
            [
                'id'              => 3,
                'title'           => 'High-Resolution 4D Ultrasound Suite',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Advanced follicular monitoring and diagnostic imaging with crystal-clear 4D ultrasound equipment.',
                'sort_order'      => 3,
                'is_active'       => 1,
            ],
            [
                'id'              => 4,
                'title'           => 'Precision ICSI & Micromanipulation Procedure',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Procedures',
                'description'     => 'Intracytoplasmic Sperm Injection performed under inverted high-magnification microscopes.',
                'sort_order'      => 4,
                'is_active'       => 1,
            ],
            [
                'id'              => 5,
                'title'           => 'Welcome to New Beginnings: Celebrating Success',
                'type'            => 'video',
                'file_url'        => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=600&h=400&fit=crop&auto=format',
                'video_source'    => 'youtube',
                'video_embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'category'        => 'Success Moments',
                'description'     => 'Hear touching success stories and joyous moments from families blessed with parenthood.',
                'sort_order'      => 5,
                'is_active'       => 1,
            ],
            [
                'id'              => 6,
                'title'           => 'Comfortable Private Consultation Chambers',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Designed with privacy, empathy, and serene ambiance for detailed one-on-one patient counseling.',
                'sort_order'      => 6,
                'is_active'       => 1,
            ],
        ];

        if (!empty($category) && strtolower($category) !== 'all') {
            if (strtolower($category) === 'videos') {
                return array_values(array_filter($items, fn($i) => $i['type'] === 'video'));
            } elseif (strtolower($category) === 'photos' || strtolower($category) === 'images') {
                return array_values(array_filter($items, fn($i) => $i['type'] === 'image'));
            } else {
                return array_values(array_filter($items, fn($i) => strcasecmp($i['category'], $category) === 0));
            }
        }

        return $items;
    }
}
