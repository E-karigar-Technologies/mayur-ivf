-- ====================================================================
-- Mayur IVF & Fertility Centre - MySQL Database Schema & Initial Data
-- Database Name: mayur_ivf (or your preferred database name)
-- Character Set: utf8mb4 / utf8mb4_unicode_ci
-- ====================================================================

CREATE DATABASE IF NOT EXISTS `mayur_ivf` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `mayur_ivf`;

-- --------------------------------------------------------------------
-- 1. Table: users (Admin Authentication & Roles)
-- --------------------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `role` VARCHAR(50) NOT NULL DEFAULT 'admin',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_users_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Initial Admin Account (Password: admin123)
INSERT INTO `users` (`id`, `name`, `email`, `password_hash`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Meetu Bhushan / Administrator', 'admin@mayurivf.com', '$2y$10$wO3nC.o5r52/jH2Z1E7Z2O5Qk6wO8w6I8m8a3y0P0r0s0e0c0u0r0e', 'admin', NOW(), NOW())
ON DUPLICATE KEY UPDATE `email` = VALUES(`email`);

-- Update password with standard bcrypt hash for admin123
UPDATE `users` SET `password_hash` = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' WHERE `email` = 'admin@mayurivf.com';


-- --------------------------------------------------------------------
-- 2. Table: categories (Dynamic Article & Treatment Categories)
-- --------------------------------------------------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `slug` VARCHAR(120) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_categories_name` (`name`),
  UNIQUE KEY `idx_categories_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'IVF', 'ivf', 'In Vitro Fertilization & Assisted Reproductive Technologies', NOW(), NOW()),
(2, 'Fertility', 'fertility', 'General Fertility Assessment, Guidance & Diagnosis', NOW(), NOW()),
(3, 'Preservation', 'preservation', 'Egg Freezing & Embryo Vitrification', NOW(), NOW()),
(4, 'PCOS', 'pcos', 'Polycystic Ovarian Syndrome & Hormonal Management', NOW(), NOW()),
(5, 'Infertility', 'infertility', 'Unexplained Infertility & Advanced Care', NOW(), NOW()),
(6, 'Treatments', 'treatments', 'IUI, ICSI, Laparoscopy & Clinical Treatments', NOW(), NOW()),
(7, 'Male Fertility', 'male-fertility', 'Sperm Health, Diagnostics & Andrology Solutions', NOW(), NOW())
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);


-- --------------------------------------------------------------------
-- 3. Table: blogs (Published Articles & Insights)
-- --------------------------------------------------------------------
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(200) NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `category` VARCHAR(100) NOT NULL DEFAULT 'IVF',
  `read_time` VARCHAR(50) NOT NULL DEFAULT '5 min read',
  `author` VARCHAR(100) NOT NULL DEFAULT 'Dr. Meetu Bhushan',
  `img` TEXT DEFAULT NULL,
  `desc` TEXT DEFAULT NULL,
  `content` LONGTEXT DEFAULT NULL,
  `is_featured` TINYINT(1) NOT NULL DEFAULT 0,
  `is_published` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_blogs_slug` (`slug`),
  KEY `idx_blogs_category` (`category`),
  KEY `idx_blogs_published` (`is_published`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `blogs` (`id`, `slug`, `title`, `category`, `read_time`, `author`, `img`, `desc`, `content`, `is_featured`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'understanding-ivf-complete-guide', 'Understanding IVF: A Complete Step-by-Step Guide', 'IVF', '6 min read', 'Dr. Meetu Bhushan', 'https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=800&h=480&fit=crop&auto=format', 'What to expect at every stage of an IVF cycle — from ovarian stimulation to egg retrieval, lab fertilization, embryo transfer and beyond.', 'In Vitro Fertilization (IVF) is one of the most effective and widely utilized assisted reproductive technologies (ART) available today. While the journey may initially feel overwhelming, understanding the step-by-step phases of the process helps bring clarity, confidence, and peace of mind.\n\n### Step 1: Initial Assessment & Ovarian Stimulation\nThe cycle begins with personalized fertility evaluations. Medications are prescribed to stimulate the ovaries into producing multiple mature eggs rather than the single egg normally released each month.\n\n### Step 2: Egg Retrieval & Sperm Collection\nWhen the follicles reach optimal maturity, a minor ultrasound-guided procedure is performed under light sedation to gently retrieve the eggs. Simultaneously, the sperm sample is prepared.\n\n### Step 3: Fertilization & Embryo Culture\nThe retrieved eggs and prepared sperm are combined in our specialized embryology laboratory. In some cases, Intracytoplasmic Sperm Injection (ICSI) is used to ensure maximum fertilization success. The developing embryos are carefully monitored for 3 to 5 days.\n\n### Step 4: Embryo Transfer\nOne or two healthy embryos are transferred directly into the uterus through a gentle, painless catheter procedure.\n\n### Step 5: The Two-Week Wait & Pregnancy Confirmation\nApproximately 10 to 14 days following the embryo transfer, a sensitive blood test (Beta-hCG) is conducted to confirm pregnancy.', 1, 1, NOW(), NOW()),
(2, 'age-and-fertility-what-you-need-to-know', 'Age and Fertility: What You Need to Know', 'Fertility', '5 min read', 'Dr. Meetu Bhushan', 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=800&h=480&fit=crop&auto=format', 'How maternal age affects egg quantity and quality, and the modern options available to optimize your reproductive timeline.', 'While age remains a key factor influencing reproductive potential, advancements in reproductive medicine offer numerous pathways to parenthood at various life stages.\n\n### Understanding Ovarian Reserve\nWomen are born with their lifetime supply of eggs. As time progresses, both the quantity and chromosomal quality of remaining eggs naturally decline. Anti-Müllerian Hormone (AMH) tests and Antral Follicle Counts (AFC) help evaluate your current reserve.\n\n### Proactive Steps\n1. Regular health screenings\n2. Fertility preservation (Egg freezing in early 30s)\n3. Pre-implantation Genetic Testing (PGT) during IVF\n4. Tailored stimulation protocols for diminished ovarian reserve', 0, 1, NOW(), NOW()),
(3, 'egg-freezing-preserving-your-fertility', 'Egg Freezing: Preserving Your Fertility for the Future', 'Preservation', '7 min read', 'Dr. Meetu Bhushan', 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&h=480&fit=crop&auto=format', 'A comprehensive look at oocyte cryopreservation: who should consider it, ideal timing, and the vitrification technology.', 'Oocyte cryopreservation (egg freezing) empowers women to preserve their fertility for medical, personal, or career reasons.\n\n### Who Should Consider Egg Freezing?\n- Women planning to start families later in life\n- Individuals undergoing medical treatments (such as chemotherapy)\n- Those with a family history of early menopause\n\n### The Vitrification Advantage\nModern ultra-rapid flash-freezing (vitrification) prevents ice crystal formation, achieving post-thaw survival rates exceeding 90%.', 0, 1, NOW(), NOW()),
(4, 'pcos-and-fertility-treatment-options', 'PCOS & Fertility: Understanding Your Treatment Options', 'PCOS', '5 min read', 'Dr. Meetu Bhushan', 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&h=480&fit=crop&auto=format', 'Polycystic ovary syndrome affects millions. Learn how lifestyle modifications, ovulation induction, and ART can help you conceive.', 'PCOS is one of the most common yet treatable causes of ovulatory infertility.\n\n### Key Management Strategies\n- **Lifestyle & Nutrition:** Low-glycemic nutrition and regular exercise improve insulin sensitivity.\n- **Ovulation Induction:** Oral medications like Letrozole or Clomiphene stimulate regular egg maturation.\n- **IUI & IVF:** Advanced options when conservative approaches require additional support.', 0, 1, NOW(), NOW()),
(5, 'male-fertility-causes-diagnosis-solutions', 'Male Fertility: Causes, Diagnosis & Advanced Solutions', 'Male Fertility', '6 min read', 'Dr. Meetu Bhushan', 'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?w=800&h=480&fit=crop&auto=format', 'Male factor contributes to roughly 40-50% of fertility challenges. Exploring semen analysis, lifestyle factors, and ICSI.', 'Fertility is a shared journey. Evaluating male reproductive parameters early ensures comprehensive and effective care.\n\n### Semen Analysis Parameters\n- Concentration (Count)\n- Motility (Movement)\n- Morphology (Structure)\n\n### Treatment Options\n- Antioxidant and nutritional therapy\n- ICSI (Intracytoplasmic Sperm Injection)\n- Micro-TESE for obstructive and non-obstructive cases', 0, 1, NOW(), NOW()),
(6, 'preparing-for-your-first-fertility-consultation', 'Preparing for Your First Fertility Consultation', 'Treatments', '4 min read', 'Dr. Meetu Bhushan', 'https://images.unsplash.com/photo-1516549655169-df83a0774514?w=800&h=480&fit=crop&auto=format', 'Essential documents to bring, questions to ask, and what to expect during your initial consultation with Dr. Meetu Bhushan.', 'Walking into your first fertility consultation is a positive and empowering step.\n\n### What to Bring\n- Past medical records and surgical history\n- Previous hormone test reports (AMH, FSH, Thyroid, Prolactin)\n- Ultrasound scans and semen analysis reports if available\n- List of questions you wish to discuss with Dr. Meetu Bhushan', 0, 1, NOW(), NOW())
ON DUPLICATE KEY UPDATE `title` = VALUES(`title`);


-- --------------------------------------------------------------------
-- 4. Table: inquiries (Appointment Bookings & CRM Inquiries)
-- --------------------------------------------------------------------
DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE `inquiries` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `phone` VARCHAR(50) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `age` INT(3) DEFAULT NULL,
  `appointment_date` DATE DEFAULT NULL,
  `consultation_type` VARCHAR(100) DEFAULT 'IVF Consultation',
  `message` TEXT DEFAULT NULL,
  `status` VARCHAR(50) NOT NULL DEFAULT 'New',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_inquiries_status` (`status`),
  KEY `idx_inquiries_created` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `inquiries` (`id`, `name`, `phone`, `email`, `age`, `appointment_date`, `consultation_type`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pooja Sharma', '+91 98765 43210', 'pooja.sharma@example.com', 31, DATE_ADD(CURDATE(), INTERVAL 2 DAY), 'IVF Consultation', 'Looking for initial consultation regarding IVF treatment and success rate estimation.', 'New', NOW(), NOW()),
(2, 'Rahul & Sunita Verma', '+91 98111 22334', 'rahul.verma@example.com', 34, DATE_ADD(CURDATE(), INTERVAL 3 DAY), 'Fertility Assessment', 'We have been trying for 2 years. Want to do comprehensive tests.', 'Contacted', NOW(), NOW()),
(3, 'Neha Gupta', '+91 99887 76655', 'neha.gupta@example.com', 29, DATE_ADD(CURDATE(), INTERVAL 5 DAY), 'PCOS Consultation', 'Diagnosed with irregular periods and PCOS, seeking advice on conceiving naturally or with IUI.', 'Scheduled', NOW(), NOW())
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);
