# Buyer Persona Expert System (BPES)

This repository contains the research artifacts supporting the article:
**"An Ontology-Based Buyer Persona Expert System with Explainable Rule-Based Inference"**
(*Under review at a Q1 journal*)

The project presents an explainable buyer persona generation approach based on ontology-driven knowledge modeling and rule-based expert system inference, designed to support transparent and auditable decision-making in digital marketing contexts.

## Directory Structure

<p align="center">
<img src="https://github.com/soulsiciety/BPES/blob/main/images/directory_structure.png" alt="Directory Structure">
</p>

## Data Availability Statement
This repository provides access to the materials supporting the findings of this study.
Each asset is listed below with its access conditions and licensing information.

### 1. Survey Instrument
- **Description**: Questionnaire used to collect buyer-related empathic, behavioral, and demographic attributes.
- **Location**: `data/survey_instrument/survey_instrument.pdf`
- **Persistent link**: https://github.com/soulsiciety/BPES/releases/tag/v1.0-bpes-data
- **Access**: Open access
- **License**: CC BY-NC 4.0

### 2. Aggregated Themes and Analytical Results
- **Description**: Anonymized and aggregated thematic summaries derived from survey responses. These indicators directly correspond to the ontology scope (Table 2) and buyer persona mappings (Table 3), enabling transparent and reproducible rule-based persona inference without disclosing respondent-level data. Raw survey responses are not shared due to ethical and consent constraints.
- **Location**: `data/aggregated_results/thematic_summary.csv`
- **Persistent link**: https://github.com/soulsiciety/BPES/releases/tag/v1.0-bpes-data
- **Access**: Open access (aggregated data only)
- **License**: CC BY-NC 4.0

### 3. Buyer Persona Ontology
- **Description**: OWL ontology formalizing the buyer persona knowledge model used in BPES, including concepts, properties, and relationships derived from the ontology scope and indicator mappings reported in the main manuscript (Tables 2–3). This ontology provides the semantic foundation for rule-based inference and explainable persona generation described in Supplementary Material C.
- **Location**: `ontology/buyer_persona_ontology.owl`
- **Persistent link**: https://github.com/soulsiciety/BPES/releases/tag/v1.0-bpes-data
- **Access**: Open access
- **License**: CC BY 4.0

### 4. Rule-Based Inference Assets
- **Description**: Machine-readable representation of the explicit IF–THEN inference rules, indicator mappings, and aggregation logic used by BPES. This artifact operationalizes the knowledge representation tables and persona classification rules reported in the main manuscript (Tables 4–5) and provides the executable realization of the inference flow detailed in Supplementary Material C.
- **Location**: `rules/inference_rules.json`
- **Persistent link**: https://github.com/soulsiciety/BPES/releases/tag/v1.0-bpes-data
- **Access**: Open access
- **License**: MIT License

### 5. Test Cases
- **Description**: Synthetic and anonymized system-level test cases derived from black-box testing scenarios, used to validate questionnaire handling, business registration, and the end-to-end execution of rule-based buyer persona inference in BPES. These cases verify that the inference pipeline described in Supplementary Material C is correctly triggered and operationalized at the system level, without exposing respondent-level data.
- **Location**: `data/test_cases/persona_cases.json`
- **Persistent link**: https://github.com/soulsiciety/BPES/releases/tag/v1.0-bpes-data
- **Access**: Open access
- **License**: MIT License

### 6. Source Code
- **Description**: Open-source implementation of the Buyer Persona Expert System (BPES), including the rule-based inference engine, ontology integration, and persona generation logic. The system is implemented using the Laravel framework, with inference-related components located within the application layer.
- **Location**: `source_code/`
- **Persistent link**: https://github.com/soulsiciety/BPES/releases/tag/v1.0-bpes-data
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

As a result, no baseline source code, datasets, or numerical benchmarking artifacts are provided in this repository. The purpose of the comparison is to highlight differences in methodological properties-consistency, required effort, explainability, and usability-rather than performance metrics.

The artifacts shared in this repository enable full reproducibility of the proposed BPES approach, while baseline descriptions serve as literature-informed reference points for contextual comparison.

## Citation of Research Artifacts
If this work is used or extended, the authors kindly request citation of:
- the associated journal article as the primary scholarly reference, and
- this GitHub repository as a supporting research artifact.

**Recommended citation format:**
> Author(s). **An Ontology-Based Buyer Persona Expert System with Explainable Rule-Based Inference**. Journal Name, under review.
> GitHub repository: Buyer Persona Expert System (BPES), version v1.0. https://github.com/soulsiciety/BPES

The repository represents a research artifact supporting the reproducibility of the proposed method.