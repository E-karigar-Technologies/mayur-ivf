<?php

namespace App\Models;

class GalleryModel
{
    /**
     * Curated Static Gallery Collection (16 High-Res Photos & Videos)
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
                'category'        => 'Success Moments',
                'description'     => 'Dr. Meetu Bhushan celebrating the joyful arrival of healthy IVF twins with proud, smiling parents at Mayor\'s IVF Centre.',
            ],
            [
                'id'              => 2,
                'title'           => 'Future Doctor: Little Miracle with Dr. Meetu Bhushan',
                'type'            => 'image',
                'file_url'        => base_url('images/gallery/dr-meetu-with-little-patient.jpg'),
                'thumbnail_url'   => base_url('images/gallery/dr-meetu-with-little-patient.jpg'),
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Success Moments',
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
                'category'        => 'Success Moments',
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
                'category'        => 'Success Moments',
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
                'category'        => 'Success Moments',
                'description'     => 'Cherished post-delivery follow-up visit with our healthy, growing IVF champion baby and Dr. Meetu Bhushan.',
            ],
            [
                'id'              => 6,
                'title'           => 'Advanced IVF & Embryology Cleanroom Laboratory',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Our sterile cleanroom embryology laboratory equipped with micromanipulators, laminar hoods, and benchtop incubators.',
            ],
            [
                'id'              => 7,
                'title'           => 'Inside Mayor\'s IVF Centre: Patient Journey & Care',
                'type'            => 'video',
                'file_url'        => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?w=600&h=400&fit=crop&auto=format',
                'video_source'    => 'youtube',
                'video_embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'category'        => 'Clinic & Labs',
                'description'     => 'A video walk-through of Dr. Meetu Bhushan\'s personalized consultation approach and supportive reproductive care environment.',
            ],
            [
                'id'              => 8,
                'title'           => 'Precision ICSI & Micromanipulation Station',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Procedures',
                'description'     => 'Intracytoplasmic Sperm Injection performed under specialized inverted microscopes for severe male infertility.',
            ],
            [
                'id'              => 9,
                'title'           => 'High-Resolution 4D Ultrasound Diagnostic Suite',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Precision follicular tracking and pelvic assessments with high-clarity 4D diagnostic ultrasound systems.',
            ],
            [
                'id'              => 10,
                'title'           => 'Celebrating Parenthood: Patient Joy & Milestone Stories',
                'type'            => 'video',
                'file_url'        => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=600&h=400&fit=crop&auto=format',
                'video_source'    => 'youtube',
                'video_embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'category'        => 'Success Moments',
                'description'     => 'Heartwarming stories from families blessed with newborn miracles after overcoming fertility hurdles.',
            ],
            [
                'id'              => 11,
                'title'           => 'Private & Confidential Consultation Chambers',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Peaceful, compassionate rooms arranged for detailed couples counseling and customized treatment planning.',
            ],
            [
                'id'              => 12,
                'title'           => 'Laser-Assisted Hatching & Embryo Biopsy Suite',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Procedures',
                'description'     => 'Targeted diode laser technologies assisting embryo implantation for recurrent failure and advanced maternal age.',
            ],
            [
                'id'              => 13,
                'title'           => 'Ultra-Modern Vitrification & Cryo-Storage Systems',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1581594693702-fbdc51b2763b?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1581594693702-fbdc51b2763b?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Liquid nitrogen cryobanks preserving eggs, sperm, and embryos with continuous multi-sensor thermal monitoring.',
            ],
            [
                'id'              => 14,
                'title'           => 'Step-by-Step IVF Procedure Explained by Dr. Meetu Bhushan',
                'type'            => 'video',
                'file_url'        => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&h=400&fit=crop&auto=format',
                'video_source'    => 'youtube',
                'video_embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'category'        => 'Procedures',
                'description'     => 'An insightful educational talk breaking down ovarian stimulation, egg pickup, embryo culture, and painless transfer.',
            ],
            [
                'id'              => 15,
                'title'           => 'Advanced Semen Analysis & CASA Diagnostic Lab',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1582719508461-905c673771fd?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1582719508461-905c673771fd?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Procedures',
                'description'     => 'Automated Computer-Aided Sperm Analysis (CASA) and DNA Fragmentation testing for male fertility evaluation.',
            ],
            [
                'id'              => 16,
                'title'           => 'Sterile Procedure Operating Theater for Egg Retrieval',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1551076805-e1869033e561?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1551076805-e1869033e561?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Laminar airflow HEPA filtered operating suites strictly maintained for painless, sterile egg collection procedures.',
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

        if (empty($category) || strtolower($category) === 'all') {
            return $items;
        }

        if (strtolower($category) === 'videos') {
            return array_values(array_filter($items, fn($i) => $i['type'] === 'video'));
        }

        if (strtolower($category) === 'photos' || strtolower($category) === 'images') {
            return array_values(array_filter($items, fn($i) => $i['type'] === 'image'));
        }

        return array_values(array_filter($items, fn($i) => strcasecmp($i['category'], $category) === 0));
    }

    public static function getCategories(): array
    {
        return ['All', 'Photos', 'Videos', 'Clinic & Labs', 'Procedures', 'Success Moments'];
    }
}
