<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table            = 'blogs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'slug',
        'title',
        'category',
        'read_time',
        'author',
        'img',
        'desc',
        'content',
        'is_featured',
        'is_published',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAll(): array
    {
        return $this->getPublished();
    }

    public function getPublished(): array
    {
        try {
            $results = $this->where('is_published', 1)->orderBy('id', 'DESC')->findAll();
            if (!empty($results)) {
                return $this->formatArticles($results);
            }
        } catch (\Throwable $e) {
            // fallback
        }

        return $this->formatArticles($this->getStaticArticles());
    }

    public function getAllArticles(): array
    {
        try {
            $results = $this->orderBy('id', 'DESC')->findAll();
            return $this->formatArticles($results);
        } catch (\Throwable $e) {
            return $this->formatArticles($this->getStaticArticles());
        }
    }

    public function getFeatured(): ?array
    {
        try {
            $featured = $this->where('is_published', 1)->where('is_featured', 1)->orderBy('id', 'DESC')->first();
            if ($featured) {
                return $this->formatArticle($featured);
            }
            $first = $this->where('is_published', 1)->orderBy('id', 'DESC')->first();
            if ($first) {
                return $this->formatArticle($first);
            }
        } catch (\Throwable $e) {
            $static = $this->getStaticArticles();
            return $this->formatArticle($static[0] ?? null);
        }

        $static = $this->getStaticArticles();
        return $this->formatArticle($static[0] ?? null);
    }

    public function getByCategory(string $category): array
    {
        if (strtolower($category) === 'all') {
            return $this->getPublished();
        }

        try {
            $results = $this->where('is_published', 1)
                            ->where('category', $category)
                            ->orderBy('id', 'DESC')
                            ->findAll();
            if (!empty($results)) {
                return $this->formatArticles($results);
            }
        } catch (\Throwable $e) {
            // fallback
        }

        $filtered = array_values(array_filter($this->getStaticArticles(), function ($a) use ($category) {
            return strcasecmp($a['category'], $category) === 0;
        }));

        return $this->formatArticles($filtered);
    }

    public function getBySlug(string $slug): ?array
    {
        try {
            $article = $this->where('slug', $slug)->first();
            if ($article) {
                return $this->formatArticle($article);
            }
        } catch (\Throwable $e) {
            // fallback
        }

        foreach ($this->getStaticArticles() as $article) {
            if ($article['slug'] === $slug) {
                return $this->formatArticle($article);
            }
        }
        return null;
    }

    private function formatArticle(?array $article): ?array
    {
        if (!$article) {
            return null;
        }
        if (!isset($article['date'])) {
            $article['date'] = isset($article['created_at']) 
                ? date('M d, Y', strtotime($article['created_at'])) 
                : date('M d, Y');
        }
        return $article;
    }

    private function formatArticles(array $articles): array
    {
        return array_values(array_filter(array_map([$this, 'formatArticle'], $articles)));
    }

    public function getCategories(): array
    {
        try {
            $db = \Config\Database::connect();
            $cats = $db->table('categories')->select('name')->orderBy('name', 'ASC')->get()->getResultArray();
            if (!empty($cats)) {
                $names = array_column($cats, 'name');
                return array_merge(['All'], array_unique(array_filter($names)));
            }
        } catch (\Throwable $e) {
            // fallback
        }

        try {
            $dbCats = $this->select('category')->distinct()->findAll();
            if (!empty($dbCats)) {
                $names = array_column($dbCats, 'category');
                return array_merge(['All'], array_unique(array_filter($names)));
            }
        } catch (\Throwable $e) {
            // fallback
        }

        $cats = array_unique(array_column($this->getStaticArticles(), 'category'));
        return array_merge(['All'], $cats);
    }

    public function getStaticArticles(): array
    {
        return [
            [
                'slug'        => 'understanding-ivf-complete-guide',
                'title'       => 'Understanding IVF: A Complete Step-by-Step Guide',
                'category'    => 'IVF',
                'read_time'   => '6 min read',
                'date'        => 'Sep 15, 2026',
                'author'      => 'Dr. Meetu Bhushan',
                'img'         => 'https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=800&h=480&fit=crop&auto=format',
                'desc'        => 'What to expect at every stage of an IVF cycle — from ovarian stimulation to egg retrieval, lab fertilization, embryo transfer and beyond.',
                'featured'    => true,
                'content'     => "In Vitro Fertilization (IVF) is one of the most effective and widely utilized assisted reproductive technologies (ART) available today. While the journey may initially feel overwhelming, understanding the step-by-step phases of the process helps bring clarity, confidence, and peace of mind.\n\n### Step 1: Initial Assessment & Ovarian Stimulation\nThe cycle begins with personalized fertility evaluations. Medications are prescribed to stimulate the ovaries into producing multiple mature eggs rather than the single egg normally released each month.\n\n### Step 2: Egg Retrieval & Sperm Collection\nWhen the follicles reach optimal maturity, a minor ultrasound-guided procedure is performed under light sedation to gently retrieve the eggs. Simultaneously, the sperm sample is prepared.\n\n### Step 3: Fertilization & Embryo Culture\nThe retrieved eggs and prepared sperm are combined in our specialized embryology laboratory. In some cases, Intracytoplasmic Sperm Injection (ICSI) is used to ensure maximum fertilization success. The developing embryos are carefully monitored for 3 to 5 days.\n\n### Step 4: Embryo Transfer\nOne or two healthy embryos are transferred directly into the uterus through a gentle, painless catheter procedure.\n\n### Step 5: The Two-Week Wait & Pregnancy Confirmation\nApproximately 10 to 14 days following the embryo transfer, a sensitive blood test (Beta-hCG) is conducted to confirm pregnancy.",
            ],
            [
                'slug'        => 'when-to-see-fertility-specialist',
                'title'       => 'When to See a Fertility Specialist: Signs & Timelines',
                'category'    => 'Fertility',
                'read_time'   => '5 min read',
                'date'        => 'Sep 10, 2026',
                'author'      => 'Dr. Meetu Bhushan',
                'img'         => 'https://images.unsplash.com/photo-1758691461935-202e2ef6b69f?w=800&h=480&fit=crop&auto=format',
                'desc'        => 'Key signs and timelines that indicate when professional fertility evaluation may be the right next step for you and your partner.',
                'featured'    => false,
                'content'     => "Deciding when to transition from trying to conceive naturally to seeking the advice of a fertility specialist is a crucial turning point. Early evaluation often uncovers simple, treatable factors that significantly shorten the time to pregnancy.\n\n### Standard Age-Based Guidelines\n- Under 35 Years: If you have been having regular, unprotected intercourse for 12 months without conception.\n- 35 to 39 Years: We recommend scheduling an evaluation after 6 months of trying.\n- 40 Years and Above: An immediate fertility assessment is recommended without waiting.\n\n### Underlying Symptoms to Watch For\n- Irregular, absent, or unusually painful menstrual periods.\n- Known history of endometriosis, pelvic inflammatory disease, or PCOS.\n- History of multiple miscarriages (recurrent pregnancy loss).\n- Known male factor concerns such as low sperm count or previous testicular surgery.",
            ],
            [
                'slug'        => 'fertility-preservation-options-guide',
                'title'       => 'Fertility Preservation: Egg & Embryo Freezing Options',
                'category'    => 'Preservation',
                'read_time'   => '4 min read',
                'date'        => 'Sep 05, 2026',
                'author'      => 'Dr. Meetu Bhushan',
                'img'         => 'https://images.unsplash.com/photo-1705746402014-a3f53dc61638?w=800&h=480&fit=crop&auto=format',
                'desc'        => 'Egg freezing, embryo banking and preservation approaches — who they are for and how vitrification technology preserves reproductive potential.',
                'featured'    => false,
                'content'     => "Fertility preservation gives individuals and couples the freedom to safeguard their reproductive potential for the future. With modern vitrification (ultra-rapid flash freezing), survival rates for cryopreserved eggs and embryos have reached record highs.\n\n### Who Should Consider Fertility Preservation?\n1. Elective / Social Freezing: Women wishing to delay parenthood while eggs are at their peak biological quality.\n2. Medical Indications: Patients preparing for oncology treatments (chemotherapy or radiation) or surgeries affecting ovarian reserve.\n3. Couples Undergoing IVF: Preserving excess high-quality embryos for future siblings.",
            ],
            [
                'slug'        => 'pcos-and-fertility-treatment',
                'title'       => 'PCOS and Fertility: What You Need to Know to Conceive',
                'category'    => 'PCOS',
                'read_time'   => '5 min read',
                'date'        => 'Aug 28, 2026',
                'author'      => 'Dr. Meetu Bhushan',
                'img'         => 'https://images.unsplash.com/photo-1673865641073-4479f93a7776?w=800&h=480&fit=crop&auto=format',
                'desc'        => 'How Polycystic Ovarian Syndrome affects ovulatory cycles and the specialized medical solutions available to achieve a healthy pregnancy.',
                'featured'    => false,
                'content'     => "Polycystic Ovarian Syndrome (PCOS) is one of the most common causes of female ovulatory infertility. However, with appropriate medical guidance, women with PCOS have extraordinarily high pregnancy success rates.\n\n### The Mechanism of PCOS Infertility\nIn PCOS, hormonal imbalances prevent follicles from maturing and releasing an egg reliably each month (anovulation or oligo-ovulation).\n\n### Treatment Pathways for PCOS\n- Lifestyle & Insulin Optimization: Improving insulin sensitivity helps regulate hormonal spikes.\n- Ovulation Induction: Medications like Letrozole or Clomiphene stimulate regular ovulation.\n- IUI & IVF: For resistant cases, advanced assisted reproductive techniques offer targeted, controlled solutions with minimal ovarian hyperstimulation risk.",
            ],
            [
                'slug'        => 'understanding-unexplained-infertility',
                'title'       => 'Understanding Unexplained Infertility: Causes & Next Steps',
                'category'    => 'Infertility',
                'read_time'   => '4 min read',
                'date'        => 'Aug 20, 2026',
                'author'      => 'Dr. Meetu Bhushan',
                'img'         => 'https://images.unsplash.com/photo-1438962136829-452260720431?w=800&h=480&fit=crop&auto=format',
                'desc'        => 'When investigations return normal results, here is how fertility specialists approach personalized diagnostic and treatment solutions.',
                'featured'    => false,
                'content'     => "Hearing that you have 'unexplained infertility' can feel frustrating when all routine screening tests come back normal.\n\nHowever, 'unexplained' does not mean untreatable. It simply means the cause lies beyond the detection threshold of routine screening tests, such as subtle egg quality issues or fertilization barriers that IVF can directly solve.",
            ],
            [
                'slug'        => 'ivf-first-appointment-what-to-expect',
                'title'       => 'IVF: What to Expect at Your First Appointment',
                'category'    => 'IVF',
                'read_time'   => '5 min read',
                'date'        => 'Aug 14, 2026',
                'author'      => 'Dr. Meetu Bhushan',
                'img'         => 'https://images.unsplash.com/photo-1758691463198-dc663b8a64e4?w=800&h=480&fit=crop&auto=format',
                'desc'        => 'A reassuring guide to your very first fertility consultation and how to prepare for the conversation ahead.',
                'featured'    => false,
                'content'     => "Walking into a fertility clinic for the first time is an emotional step. At Mayor's IVF, our goal is to make your first visit reassuring, informative, and unhurried.\n\n### What Happens in Your First Visit\n1. Medical History Review: Thorough discussion of your reproductive background, previous tests, and family medical history.\n2. Ultrasound Scan: A preliminary pelvic ultrasound to evaluate ovarian reserve and uterine lining.\n3. Custom Action Plan: Outlining the most appropriate diagnostic tests or treatment steps without unnecessary delays.",
            ],
            [
                'slug'        => 'iui-vs-ivf-differences-explained',
                'title'       => 'IUI vs IVF: Which Fertility Treatment is Right for You?',
                'category'    => 'Treatments',
                'read_time'   => '6 min read',
                'date'        => 'Aug 08, 2026',
                'author'      => 'Dr. Meetu Bhushan',
                'img'         => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&h=480&fit=crop&auto=format',
                'desc'        => 'A clear comparison of Intrauterine Insemination (IUI) and In Vitro Fertilization (IVF) to help determine the optimal path for your family.',
                'featured'    => false,
                'content'     => "Both IUI and IVF are proven assisted conception treatments, but they differ significantly in complexity, invasive level, and success rates per cycle.\n\n### Key Comparison\n- IUI (Intrauterine Insemination): Concentrated sperm is placed directly inside the uterus around the time of ovulation. Fertilization occurs naturally inside the fallopian tubes.\n- IVF (In Vitro Fertilization): Fertilization happens outside the body in an embryology laboratory.",
            ],
            [
                'slug'        => 'male-fertility-evaluation-and-care',
                'title'       => 'Male Factor Infertility: Assessment, Diagnosis & Solutions',
                'category'    => 'Male Fertility',
                'read_time'   => '5 min read',
                'date'        => 'Aug 01, 2026',
                'author'      => 'Dr. Meetu Bhushan',
                'img'         => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=800&h=480&fit=crop&auto=format',
                'desc'        => 'Understanding male fertility health, semen parameters, and advanced techniques like ICSI and IMSI.',
                'featured'    => false,
                'content'     => "Male factors account for approximately 40% to 50% of all fertility challenges. Fortunately, diagnostic semen analysis and advanced laboratory techniques like ICSI make achieving pregnancy achievable even in severe cases.",
            ],
        ];
    }
}
