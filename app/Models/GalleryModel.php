<?php

namespace App\Models;

class GalleryModel
{
    /**
     * Genuine Static Gallery Collection (15 Authentic Photos with Dr. Meetu Bhushan)
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
                'title'           => 'Double Joy: Adorable Twin Baby Girls',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-twin-baby-girls-yellow.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-twin-baby-girls-yellow.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Twins Blessing',
                'description'     => 'Dr. Meetu Bhushan holding healthy twin baby girls in matching bright yellow dresses during a heart-filling post-birth clinic visit.',
            ],
            [
                'id'              => 3,
                'title'           => 'Joy of Double Miracles: Healthy Newborn Twins',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-newborn-twins-green.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-newborn-twins-green.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Twins Blessing',
                'description'     => 'Dr. Meetu Bhushan with newborn twin babies, delivering double happiness and smiles to overjoyed parents.',
            ],
            [
                'id'              => 4,
                'title'           => 'Twin Blessings Consultation Visit',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-consultation-office-twins.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-consultation-office-twins.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Twins Blessing',
                'description'     => 'Special consultation chamber moment with Dr. Meetu Bhushan holding twin babies after another successful IVF journey.',
            ],
            [
                'id'              => 5,
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
                'id'              => 6,
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
                'id'              => 7,
                'title'           => 'Sweet Dreams: Sleeping Newborn in Carrier Pouch',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-sleeping-baby-blue-carrier.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-sleeping-baby-blue-carrier.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Newborn Joy',
                'description'     => 'A soundly sleeping newborn baby safely tucked in a cozy blue carrier pouch beside Dr. Meetu Bhushan.',
            ],
            [
                'id'              => 8,
                'title'           => 'Sunshine Blessing: Newborn in Lemon Wrap',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-baby-lemon-wrap.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-baby-lemon-wrap.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Newborn Joy',
                'description'     => 'Dr. Meetu Bhushan cradling a serene newborn baby snug in a yellow lemon-print hooded wrap during a clinic consultation.',
            ],
            [
                'id'              => 9,
                'title'           => 'Cozy Winter Follow-Up Visit',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-baby-winter-sweater.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-baby-winter-sweater.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic Milestones',
                'description'     => 'Dr. Meetu Bhushan holding a cute, wide-eyed baby boy in warm winter knitwear visiting Mayor\'s IVF Clinic.',
            ],
            [
                'id'              => 10,
                'title'           => 'Precious Smile: Baby Girl in Pink Beanie',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-baby-girl-pink-beanie.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-baby-girl-pink-beanie.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic Milestones',
                'description'     => 'An adorable baby girl with a floral knit beanie and mint jacket warmly embraced by Dr. Meetu Bhushan.',
            ],
            [
                'id'              => 11,
                'title'           => 'Celebrating Healthy Growth: Milestone Visit',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-with-growing-baby-boy.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-with-growing-baby-boy.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic Milestones',
                'description'     => 'Dr. Meetu Bhushan with a healthy, thriving IVF baby boy during a joyful post-birth clinic celebration.',
            ],
            [
                'id'              => 12,
                'title'           => 'Milestone Clinic Visit with Healthy IVF Champion',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-baby-clinic-visit.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-baby-clinic-visit.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic Milestones',
                'description'     => 'Cherished post-delivery follow-up visit with our healthy, growing IVF champion baby and Dr. Meetu Bhushan.',
            ],
            [
                'id'              => 13,
                'title'           => 'Peaceful Newborn Sleep in Caring Arms',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-sleeping-newborn-blue.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-sleeping-newborn-blue.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Newborn Joy',
                'description'     => 'A peaceful newborn baby comfortably resting with Dr. Meetu Bhushan after successful clinical care.',
            ],
            [
                'id'              => 14,
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
                'id'              => 15,
                'title'           => 'Medical Excellence & Women Healthcare Gathering',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-medical-conference-event.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-medical-conference-event.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Events & Outreach',
                'description'     => 'Dr. Meetu Bhushan participating in women empowerment and reproductive health awareness initiatives alongside medical professionals.',
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
        return ['All', 'Twins Blessing', 'Clinic Milestones', 'Newborn Joy', 'Events & Outreach'];
    }
}
