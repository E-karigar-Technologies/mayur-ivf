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
                'title'           => 'Advanced IVF & Embryology Laboratory',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Our cleanroom embryology laboratory equipped with modern micromanipulators, laminar flow hoods, and laser hatching technology.',
            ],
            [
                'id'              => 2,
                'title'           => 'Inside Mayor\'s IVF Centre: Patient Journey & Compassionate Care',
                'type'            => 'video',
                'file_url'        => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?w=600&h=400&fit=crop&auto=format',
                'video_source'    => 'youtube',
                'video_embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'category'        => 'Success Moments',
                'description'     => 'A video walk-through of Dr. Meetu Bhushan\'s personalized consultation approach and supportive reproductive care environment.',
            ],
            [
                'id'              => 3,
                'title'           => 'High-Resolution 4D Ultrasound Diagnostic Suite',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Precision follicular tracking and gynecological assessments with high-clarity 4D diagnostic ultrasound systems.',
            ],
            [
                'id'              => 4,
                'title'           => 'Precision ICSI & Micromanipulation Procedure Station',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Procedures',
                'description'     => 'Intracytoplasmic Sperm Injection performed by senior embryologists under specialized inverted microscopes.',
            ],
            [
                'id'              => 5,
                'title'           => 'Celebrating Parenthood: Patient Joy & Milestone Stories',
                'type'            => 'video',
                'file_url'        => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=600&h=400&fit=crop&auto=format',
                'video_source'    => 'youtube',
                'video_embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'category'        => 'Success Moments',
                'description'     => 'Hear heartwarming stories from families blessed with newborn miracles after overcoming fertility hurdles.',
            ],
            [
                'id'              => 6,
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
                'id'              => 7,
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
                'id'              => 8,
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
                'id'              => 9,
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
                'id'              => 10,
                'title'           => 'Serene Patient Recovery & Wellness Lounge',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Comfortable recovery suites where patients relax post-procedures under dedicated nursing attention.',
            ],
            [
                'id'              => 11,
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
                'id'              => 12,
                'title'           => 'Warm Reception & Patient Care Desk',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1629909615184-74f495363b67?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1629909615184-74f495363b67?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Our friendly care coordinators assisting you with appointments, scheduling, and guidance from day one.',
            ],
            [
                'id'              => 13,
                'title'           => 'Follicular Scan & Ovulation Tracking Suite',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1584515933487-779824d29309?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1584515933487-779824d29309?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Procedures',
                'description'     => 'Accurate cycle monitoring ensuring medications and IUI/IVF procedures are timed with peak ovarian response.',
            ],
            [
                'id'              => 14,
                'title'           => 'Mother & Newborn Consultation: The Miracle of IVF',
                'type'            => 'video',
                'file_url'        => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?w=600&h=400&fit=crop&auto=format',
                'video_source'    => 'youtube',
                'video_embed_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'category'        => 'Success Moments',
                'description'     => 'A joyful post-delivery follow-up capturing the emotional bond between parents, child, and the medical team.',
            ],
            [
                'id'              => 15,
                'title'           => 'Sterile Procedure Operating Theater for Egg Retrieval',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1551076805-e1869033e561?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1551076805-e1869033e561?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Clinic & Labs',
                'description'     => 'Laminar airflow HEPA filtered operating suites strictly maintained for painless, sterile egg collection procedures.',
            ],
            [
                'id'              => 16,
                'title'           => 'Dr. Meetu Bhushan One-on-One Counseling & Treatment Roadmap',
                'type'            => 'image',
                'file_url'        => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=1200&h=800&fit=crop&auto=format',
                'thumbnail_url'   => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=600&h=400&fit=crop&auto=format',
                'video_source'    => null,
                'video_embed_url' => null,
                'category'        => 'Procedures',
                'description'     => 'Evidence-based individualized treatment roadmaps formulated after thorough discussion of medical history and goals.',
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
