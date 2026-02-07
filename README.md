<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Buyer Persona Expert System (BPES)

This repository contains the research artifacts supporting the article:
**"An Ontology-Based Buyer Persona Expert System with Explainable Rule-Based Inference"**
(*Under review at a Q1 journal*)

The project presents an explainable buyer persona generation approach based on ontology-driven knowledge modeling and rule-based expert system inference, designed to support transparent and auditable decision-making in digital marketing contexts.

## Directory Structure

<p align="center">
<img src="https://github.com/soulsiciety/quisioner-usaha/blob/main/images/directory_structure.png" alt="Directory Structure">
</p>

## Data Availability Statement
This repository provides access to the materials supporting the findings of this study.
Each asset is listed below with its access conditions and licensing information.

### 1. Survey Instrument
- **Description**: Questionnaire used to collect buyer-related empathic, behavioral, and demographic attributes.
- **Location**: `data/survey_instrument/survey_instrument.pdf`
- **Persistent link**: https://github.com/soulsiciety/quisioner-usaha/releases/tag/v1.0-bpes-data
- **Access**: Open access
- **License**: CC BY-NC 4.0

### 2. Aggregated Themes and Analytical Results
- **Description**: Anonymized and aggregated thematic summaries derived from survey responses. These indicators directly correspond to the ontology scope (Table 2) and buyer persona mappings (Table 3), enabling transparent and reproducible rule-based persona inference without disclosing respondent-level data. Raw survey responses are not shared due to ethical and consent constraints.
- **Location**: `data/aggregated_results/thematic_summary.csv`
- **Persistent link**: https://github.com/soulsiciety/quisioner-usaha/releases/tag/v1.0-bpes-data
- **Access**: Open access (aggregated data only)
- **License**: CC BY-NC 4.0

### 3. Buyer Persona Ontology
- **Description**: OWL ontology formalizing the buyer persona knowledge model used in BPES, including concepts, properties, and relationships derived from the ontology scope and indicator mappings reported in the main manuscript (Tables 2–3). This ontology provides the semantic foundation for rule-based inference and explainable persona generation described in Supplementary Material C.
- **Location**: `ontology/buyer_persona_ontology.owl`
- **Persistent link**: https://github.com/soulsiciety/quisioner-usaha/releases/tag/v1.0-bpes-data
- **Access**: Open access
- **License**: CC BY 4.0

### 4. Rule-Based Inference Assets
- **Description**: Machine-readable representation of the explicit IF–THEN inference rules, indicator mappings, and aggregation logic used by BPES. This artifact operationalizes the knowledge representation tables and persona classification rules reported in the main manuscript (Tables 4–5) and provides the executable realization of the inference flow detailed in Supplementary Material C.
- **Location**: `rules/inference_rules.json`
- **Persistent link**: https://github.com/soulsiciety/quisioner-usaha/releases/tag/v1.0-bpes-data
- **Access**: Open access
- **License**: MIT License

### 5. Test Cases
- **Description**: Synthetic and anonymized system-level test cases derived from black-box testing scenarios, used to validate questionnaire handling, business registration, and the end-to-end execution of rule-based buyer persona inference in BPES. These cases verify that the inference pipeline described in Supplementary Material C is correctly triggered and operationalized at the system level, without exposing respondent-level data.
- **Location**: `data/test_cases/persona_cases.json`
- **Persistent link**: https://github.com/soulsiciety/quisioner-usaha/releases/tag/v1.0-bpes-data
- **Access**: Open access
- **License**: MIT License

### 6. Source Code
- **Description**: Open-source implementation of the Buyer Persona Expert System (BPES), including the rule-based inference engine, ontology integration, and persona generation logic. The system is implemented using the Laravel framework, with inference-related components located within the application layer.
- **Location**: `app/`
- **Persistent link**: https://github.com/soulsiciety/quisioner-usaha/releases/tag/v1.0-bpes-data
- **Access**: Open access
- **License**: MIT License (OSI-approved)

### 7. Restricted Raw Human Data
- **Description**: Raw individual-level survey responses collected during the knowledge acquisition phase.
- **Availability**: Not publicly shared to protect participant confidentiality and comply with ethical approval conditions.
- **Qualified Access Procedure**: Access to raw data may be requested for academic research purposes by contacting the corresponding author. Requests should include: **institutional affiliation, research objectives evidence of ethics approval or exemption (if applicable)**. All requests will be reviewed in accordance with institutional and national data protection regulations.

## Ethics Approval and Informed Consent
This study involved human participants.

- **Ethical Oversight**: The study protocol was reviewed and approved by the **Center for Research and Community Service (Pusat Penelitian dan Pengabdian kepada Masyarakat), Politeknik Negeri Bali**, acting as the institutional ethics review body. Approval Reference Number: **01910/DST/PL8/AL.04/2024**
- **Regulatory Compliance**: The study was conducted in accordance with applicable institutional policies and national regulations governing research involving human participants in social science and information systems research.
- **Informed Consent**: The study involved a limited number of participants under the age of 18. Participation of minors was strictly voluntary and conducted only with prior informed consent obtained from parents or legal guardians, in accordance with national ethical research guidelines.
- **Confidentiality and Data Protection**: Personal identifiers were removed prior to analysis. Raw data were stored on secured systems accessible only to the research team. Only anonymized and aggregated data are shared publicly through this repository.

## Reproducibility
All experiments reported in the paper can be reproduced using:
- the shared ontology,
- rule-based inference logic,
- synthetic test cases, and
- source code provided in this repository.

Reproducibility does not rely on access to raw individual-level survey data.

Instead, the experimental pipeline is fully supported by the publicly available artifacts and synthetic inputs that preserve the structural and logical properties of the original data while ensuring participant confidentiality.

## Comparative Baseline Evaluation (Conceptual)
The comparative baseline evaluation reported in Table 6 of the manuscript situates the proposed Buyer Persona Expert System (BPES) relative to commonly used persona construction approaches, namely:
- (i) manual expert-based formulation and
- (ii) clustering-based data-driven approaches.

This evaluation is **conceptual and analytical in nature**, conducted using the same persona requirements and problem context, rather than by re-implementing or benchmarking executable baseline systems.

The comparison is grounded in:
- empirical observations from the development and deployment of BPES
- well-documented characteristics of manual expert-driven persona construction (e.g., reliance on implicit expert judgment and high time cost)
- widely reported limitations of clustering-based persona approaches, including parameter sensitivity and lack of explainability.

As a result, no baseline source code, datasets, or numerical benchmarking artifacts are provided in this repository. The purpose of the comparison is to highlight differences in methodological properties—consistency, required effort, explainability, and usability—rather than performance metrics.

The artifacts shared in this repository enable full reproducibility of the proposed BPES approach, while baseline descriptions serve as literature-informed reference points for contextual comparison.




- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
