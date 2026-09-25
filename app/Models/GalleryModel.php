<?php

namespace App\Models;

class GalleryModel
{
    /**
     * Genuine Static Gallery Collection (Real Images with Dr. Meetu Bhushan)
     */
    public static function getAllItems(): array
    {
        return [
            [
                'id'              => 1,
                'title'           => 'Dr. Meetu Bhushan with Blessed Newborn Twins',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-twins-blessing.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-twins-blessing.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Twins Blessing',
                'description'     => 'Dr. Meetu Bhushan celebrating the joyous arrival of healthy IVF twins with proud, smiling parents at Mayor\'s IVF Centre.',
            ],
            [
                'id'              => 2,
                'title'           => 'Future Doctor: Little Miracle with Dr. Meetu Bhushan',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-with-little-patient.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-with-little-patient.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic Milestones',
                'description'     => 'Dr. Meetu Bhushan during a joyful clinic checkup with one of our sweetest IVF success babies playfully exploring a stethoscope.',
            ],
            [
                'id'              => 3,
                'title'           => 'A Warm Embrace of Parenthood & Hope',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-blessed-newborn-cuddle.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-blessed-newborn-cuddle.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Newborn Joy',
                'description'     => 'Dr. Meetu Bhushan holding a peaceful newborn baby, marking another successful and emotional parenthood dream fulfilled.',
            ],
            [
                'id'              => 4,
                'title'           => 'Precious Newborn Miracle Welcomed with Love',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-newborn-miracle.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-newborn-miracle.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Newborn Joy',
                'description'     => 'A touching glimpse of new life made possible through advanced reproductive technology, patient care, and dedication.',
            ],
            [
                'id'              => 5,
                'title'           => 'Milestone Clinic Visit with Healthy IVF Champion',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-baby-clinic-visit.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-baby-clinic-visit.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic Milestones',
                'description'     => 'Cherished post-delivery follow-up visit with our healthy, growing IVF champion baby and Dr. Meetu Bhushan.',
            ],
        ];
    }

    public static function getHomeGallery(int $limit = 8): array
    {
        return array_slice(self::getAllItems(), 0, $limit);
    }

    public static function getCategoryItems(?string $category = null): array
    {
        $items = self::getAllItems();

        if (empty($category) || strtolower($category) === 'all' || strtolower($category) === 'all photos') {
            return $items;
        }

        return array_values(array_filter($items, fn($i) => strcasecmp($i['category'], $category) === 0));
    }

    public static function getCategories(): array
    {
        return ['All', 'Twins Blessing', 'Clinic Milestones', 'Newborn Joy'];
    }
}
