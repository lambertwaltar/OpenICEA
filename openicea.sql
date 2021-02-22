-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 05:28 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openicea`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `ReturnDate` date DEFAULT NULL,
  `ReturnTime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Patient` bigint(20) UNSIGNED DEFAULT NULL,
  `ReturnReason` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`OID`, `ReturnDate`, `ReturnTime`, `Patient`, `ReturnReason`, `created_at`, `updated_at`) VALUES
(1, '2020-12-10', '14:15', 1, NULL, '2020-11-15 11:15:40', '2020-11-15 11:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `appointments_reason`
--

CREATE TABLE `appointments_reason` (
  `appointments_OID` int(10) UNSIGNED NOT NULL,
  `reason_OID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_encounter`
--

CREATE TABLE `appointment_encounter` (
  `appointment_OID` int(10) UNSIGNED NOT NULL,
  `encounter_OID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_encounter`
--

INSERT INTO `appointment_encounter` (`appointment_OID`, `encounter_OID`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_type`
--

CREATE TABLE `appointment_type` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_type`
--

INSERT INTO `appointment_type` (`OID`, `Code`, `Name`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Doctor', '2020-11-15 11:21:12', '2020-11-15 11:21:12'),
(2, NULL, 'Nurse', '2020-11-15 11:21:19', '2020-11-15 11:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `chartlocation`
--

CREATE TABLE `chartlocation` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinician`
--

CREATE TABLE `clinician` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FirstName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Surname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ClinicianType` int(11) DEFAULT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `condition`
--

CREATE TABLE `condition` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`OID`, `Name`, `created_at`, `updated_at`) VALUES
(1, 'Uganda', NULL, NULL),
(2, 'Kenya', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE `county` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `District` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`OID`, `Name`, `District`, `created_at`, `updated_at`) VALUES
(1, 'Kawempe', 1, '2020-11-09 18:15:20', '2020-11-09 18:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Country` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`OID`, `Name`, `Country`, `created_at`, `updated_at`) VALUES
(1, 'Kampala', 1, '2020-11-09 18:15:00', '2020-11-09 18:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `DrugName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Dose` double(8,2) DEFAULT NULL,
  `Preparation` int(11) DEFAULT NULL,
  `Measurement` int(11) DEFAULT NULL,
  `ShortName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MediType` int(11) DEFAULT NULL,
  `groupidForConversion` int(11) DEFAULT NULL,
  `NavCode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ForSale` int(11) DEFAULT NULL,
  `PMargin` double(8,2) DEFAULT NULL,
  `UnitPrice` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`OID`, `DrugName`, `Dose`, `Preparation`, `Measurement`, `ShortName`, `MediType`, `groupidForConversion`, `NavCode`, `ForSale`, `PMargin`, `UnitPrice`, `created_at`, `updated_at`) VALUES
(1, 'Effavirenz', NULL, 1, 1, NULL, 1, NULL, NULL, 2, NULL, NULL, '2020-11-13 20:08:16', '2020-11-13 20:08:16'),
(2, 'Truvida', 300.00, 2, 1, NULL, 1, NULL, NULL, 2, NULL, NULL, '2020-11-13 20:08:50', '2020-11-13 20:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `drug_regimen`
--

CREATE TABLE `drug_regimen` (
  `regimen_OID` int(10) UNSIGNED NOT NULL,
  `drug_OID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drug_regimen`
--

INSERT INTO `drug_regimen` (`regimen_OID`, `drug_OID`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dsdmtype`
--

CREATE TABLE `dsdmtype` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dsdmtype`
--

INSERT INTO `dsdmtype` (`OID`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'CCLAD', '2020-11-10 08:13:23', '2020-11-10 08:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `encounter`
--

CREATE TABLE `encounter` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `visitDate` date DEFAULT NULL,
  `Visitor` int(11) DEFAULT NULL,
  `OtherVisitor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VisitType` int(11) DEFAULT NULL,
  `OtherVisitType` int(11) DEFAULT NULL,
  `Return_appointment_date` date DEFAULT NULL,
  `IsPrivate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Patient` bigint(20) UNSIGNED DEFAULT NULL,
  `VisitReason` bigint(20) UNSIGNED DEFAULT NULL,
  `OtherVisitReason` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RepresentationReason` int(11) DEFAULT NULL,
  `OtherReason` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `encounter`
--

INSERT INTO `encounter` (`OID`, `visitDate`, `Visitor`, `OtherVisitor`, `VisitType`, `OtherVisitType`, `Return_appointment_date`, `IsPrivate`, `Patient`, `VisitReason`, `OtherVisitReason`, `RepresentationReason`, `OtherReason`, `created_at`, `updated_at`) VALUES
(1, '2020-11-10', 1, NULL, 1, NULL, NULL, '1', 1, NULL, NULL, NULL, NULL, '2020-11-10 08:59:05', '2020-11-10 08:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `filedata`
--

CREATE TABLE `filedata` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `size` int(11) DEFAULT NULL,
  `FileName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longblob DEFAULT NULL,
  `Patient` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filedata`
--

INSERT INTO `filedata` (`OID`, `size`, `FileName`, `content`, `Patient`, `created_at`, `updated_at`) VALUES
(1, NULL, 'uploads/1.jpg', NULL, 1, '2020-11-10 08:17:42', '2020-11-10 08:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `flowsheet`
--

CREATE TABLE `flowsheet` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `TriageDate` date DEFAULT NULL,
  `Reasons` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Patient` bigint(20) UNSIGNED DEFAULT NULL,
  `Provider` bigint(20) UNSIGNED DEFAULT NULL,
  `Encounter` bigint(20) UNSIGNED DEFAULT NULL,
  `BPHigh` double(8,2) DEFAULT NULL,
  `BPLow` double(8,2) DEFAULT NULL,
  `Temperatue` double(8,2) DEFAULT NULL,
  `Weight` double(8,2) DEFAULT NULL,
  `Height` double(8,2) DEFAULT NULL,
  `MUAC` double(8,2) DEFAULT NULL,
  `WHOStage` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Karnofskyscore` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CDCScore` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TB` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Coughing` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BloodSputum` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PersistentFever` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WeightLoss` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NightSweats` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OlsMalignancy` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherClinicalEvent` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MenstrualStatus` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StartLastMenstrual` date DEFAULT NULL,
  `ContraceptiveMethod` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `STIScreeningSymptom` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Prophylaxis` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `INHStart` date DEFAULT NULL,
  `IHNEnd` date DEFAULT NULL,
  `ART` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NotStrartARVReason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Regimen` bigint(20) UNSIGNED DEFAULT NULL,
  `DSDMType` bigint(20) UNSIGNED DEFAULT NULL,
  `AdherenceScore` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Toxicity` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SwitchReason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SwitchDate` date DEFAULT NULL,
  `StopReason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StopDate` date DEFAULT NULL,
  `ARTSource` bigint(20) UNSIGNED DEFAULT NULL,
  `OtherARTSource` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Hypertension` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AntiHypertension` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HypertensionMedicine` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherHypertensionMedicine` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Diabetes` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AntiDiabetes` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DiabetesMedicine` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherDiabetesMedicine` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cancer` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CancerType` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Chemotherapy` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherChemotherapy` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OrganMonitoring` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OrganMonitored` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RenalDisease` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CurrenteGFR` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UrineProtein` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HeartDisease` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ECG` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HeartECHO` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ECGDate` date DEFAULT NULL,
  `ECHODate` date DEFAULT NULL,
  `DVT` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Asthma` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Epilepsy` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MentalHealthIllness` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HepatitisB` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Disability` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SpecifyDisability` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherDiability` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherMedicalCondition` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Comments` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flowsheet`
--

INSERT INTO `flowsheet` (`OID`, `TriageDate`, `Reasons`, `Patient`, `Provider`, `Encounter`, `BPHigh`, `BPLow`, `Temperatue`, `Weight`, `Height`, `MUAC`, `WHOStage`, `Karnofskyscore`, `CDCScore`, `TB`, `Coughing`, `BloodSputum`, `PersistentFever`, `WeightLoss`, `NightSweats`, `OlsMalignancy`, `OtherClinicalEvent`, `MenstrualStatus`, `StartLastMenstrual`, `ContraceptiveMethod`, `STIScreeningSymptom`, `Prophylaxis`, `INHStart`, `IHNEnd`, `ART`, `NotStrartARVReason`, `Regimen`, `DSDMType`, `AdherenceScore`, `Toxicity`, `SwitchReason`, `SwitchDate`, `StopReason`, `StopDate`, `ARTSource`, `OtherARTSource`, `Hypertension`, `AntiHypertension`, `HypertensionMedicine`, `OtherHypertensionMedicine`, `Diabetes`, `AntiDiabetes`, `DiabetesMedicine`, `OtherDiabetesMedicine`, `Cancer`, `CancerType`, `Chemotherapy`, `OtherChemotherapy`, `OrganMonitoring`, `OrganMonitored`, `RenalDisease`, `CurrenteGFR`, `UrineProtein`, `HeartDisease`, `ECG`, `HeartECHO`, `ECGDate`, `ECHODate`, `DVT`, `Asthma`, `Epilepsy`, `MentalHealthIllness`, `HepatitisB`, `Disability`, `SpecifyDisability`, `OtherDiability`, `OtherMedicalCondition`, `Comments`, `created_at`, `updated_at`) VALUES
(12, '2020-11-14', NULL, 1, 1, 1, 120.00, 95.00, 39.00, 98.00, 193.00, 26.00, '2', '20', 'A', '1', '2', '2', '2', '2', '2', 'O1b,O1b,1,O5,', 'E1,E3,E6,', '1', '2020-11-05', 'CM0,', 'SS5,', 'P1,P3,', '2020-11-02', '2020-11-04', '1', 'N2,N5,', 1, 1, '95', 'T0,', 'C1,C3,', '2020-11-01', NULL, '2020-10-05', 1, NULL, 'Yes', 'Yes', 'Nifedipine,Bendroflumethiazide,Other,', NULL, 'Yes', 'Yes', 'Insulin,Glibenclamide,Other,', NULL, 'Yes', 'asdas', 'Yes', 'sssss', 'Yes', 'sdsasda', 'Yes', '22', '1', 'No', NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'other', 'I work quite well', 'qwertyuiopasass', 'The Patient shows Improvement', '2020-11-14 03:35:43', '2020-11-14 03:35:43'),
(15, '2020-11-25', NULL, 1, 1, 1, 120.00, 81.00, 36.00, 85.00, 193.00, 26.00, '2', '70', 'A', '1', '2', '2', '2', '2', '2', 'O1a,1,', 'E0,', '1', '2020-11-02', 'CM0,', 'SS2,SS5,', 'P1,', NULL, NULL, '1', 'N3,', 1, 1, '90', 'T2,', 'C1,', NULL, 'ST1,ST3,', NULL, NULL, NULL, 'Yes', 'Yes', 'Nifedipine,Other,', NULL, 'Yes', 'Yes', 'Metformine,Other,', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, 'Yes', NULL, '1', 'Yes', 'Yes', NULL, '2020-11-17', NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'other', NULL, NULL, NULL, '2020-11-25 07:19:00', '2020-11-25 07:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `fundingsource`
--

CREATE TABLE `fundingsource` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Specifiable` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fundingsource`
--

INSERT INTO `fundingsource` (`OID`, `Code`, `Name`, `Specifiable`, `created_at`, `updated_at`) VALUES
(1, 'A1', 'IDI', NULL, '2020-11-10 08:13:56', '2020-11-10 08:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `generalrequisitionresult`
--

CREATE TABLE `generalrequisitionresult` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `PurpleTopTube` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RedTopTube` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Urine` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sputum` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FingerPrick` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherSample` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherSampleSpecify` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CollectionDate` date DEFAULT NULL,
  `CollectionTime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TestDate` date DEFAULT NULL,
  `Hemoglobin` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HemoglobinResults` double(8,2) DEFAULT NULL,
  `PeripheralSmear` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PeripheralSmearResults` double(8,2) DEFAULT NULL,
  `Syphillis` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SyphillisResults` int(11) DEFAULT NULL,
  `RPR` int(11) DEFAULT NULL,
  `RPRTitreValue` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BloodGlucose` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BloodGlucoseResults` double(8,2) DEFAULT NULL,
  `BloodSmear` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BloodSmearResults` int(11) DEFAULT NULL,
  `MRDTResult` int(11) DEFAULT NULL,
  `ParasitesSeen` int(11) DEFAULT NULL,
  `ParasiteQuantity` int(11) DEFAULT NULL,
  `BloodSmearParasiteSpecies` int(11) DEFAULT NULL,
  `BloodSmearResultComments` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UrineDipStick` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UrineColor` int(11) DEFAULT NULL,
  `UrineClarity` int(11) DEFAULT NULL,
  `UrineSpecificGravity` int(11) DEFAULT NULL,
  `UrinePH` int(11) DEFAULT NULL,
  `UrineNitrites` int(11) DEFAULT NULL,
  `UrineLeuk` int(11) DEFAULT NULL,
  `UrineProtein` int(11) DEFAULT NULL,
  `UrineGlucose` int(11) DEFAULT NULL,
  `UrineKetones` int(11) DEFAULT NULL,
  `UrineUrobil` int(11) DEFAULT NULL,
  `UrineBilirubin` int(11) DEFAULT NULL,
  `UrineBlood` int(11) DEFAULT NULL,
  `UrineLAMResult` int(11) DEFAULT NULL,
  `UrineWBCs` double(8,2) DEFAULT NULL,
  `UrineRBCs` double(8,2) DEFAULT NULL,
  `UrineEpis` double(8,2) DEFAULT NULL,
  `UrineCasts` double(8,2) DEFAULT NULL,
  `UrineCrystals` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UrineYeast` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UrineOrg` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UrinePregnancy` int(11) DEFAULT NULL,
  `StoolDirectExamination` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StoolForm` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StoolParasitesSeen` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StoolParasiteSpecies` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `StoolWBCs` double(8,2) DEFAULT NULL,
  `StoolYeast` double(8,2) DEFAULT NULL,
  `GramStainSource` int(11) DEFAULT NULL,
  `GramStainNoOrganisms` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GramStainOrganismsSeen` int(11) DEFAULT NULL,
  `GramStainOrganisms` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AFBSmearLymph` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AFBSmearSputum` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `znMicroscopy` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ResultznMicroscopy` int(11) DEFAULT NULL,
  `LevelznMicroscopy` int(11) DEFAULT NULL,
  `FlourescenceMicroscopic` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ResultFlourescenceMicroscopy` int(11) DEFAULT NULL,
  `LevelFlourescenceMicroscopy` int(11) DEFAULT NULL,
  `Sample1` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sample2` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sample3` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TBCultureDone` int(11) DEFAULT NULL,
  `TBCultureResult` int(11) DEFAULT NULL,
  `RifampicinSensitivityResult` int(11) DEFAULT NULL,
  `IsoniazidSensitivityResult` int(11) DEFAULT NULL,
  `PyrazinamideSensitivityResult` int(11) DEFAULT NULL,
  `EthambutolSensitivityResult` int(11) DEFAULT NULL,
  `StreptomycinSensitivityResult` int(11) DEFAULT NULL,
  `CragResult` int(11) DEFAULT NULL,
  `NeisseriaGonorrhoea` int(11) DEFAULT NULL,
  `ChlamydiaTrachomatis` int(11) DEFAULT NULL,
  `Patient` bigint(20) UNSIGNED DEFAULT NULL,
  `TestedBy` bigint(20) UNSIGNED DEFAULT NULL,
  `LabRequisition` bigint(20) UNSIGNED DEFAULT NULL,
  `LabSampleCollection` bigint(20) UNSIGNED DEFAULT NULL,
  `Encounter` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hivscreeningrequisitionresult`
--

CREATE TABLE `hivscreeningrequisitionresult` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `PurpleTopTube` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RedTopTube` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherSample` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherSampleSpecify` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CollectionDate` date DEFAULT NULL,
  `CollectionTime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SampleComments` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TestDate` date DEFAULT NULL,
  `AIDSDefiningIllness` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OptionADoctor` int(11) DEFAULT NULL,
  `OptionBDoctor_Counsellor` int(11) DEFAULT NULL,
  `Comment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SingleTest` int(11) DEFAULT NULL,
  `HIVScreeningOption` int(11) DEFAULT NULL,
  `ScreeningTest` int(11) DEFAULT NULL,
  `TieBreakerTest` int(11) DEFAULT NULL,
  `ConfirmationTest` int(11) DEFAULT NULL,
  `FinalResult` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Patient` bigint(20) UNSIGNED DEFAULT NULL,
  `TestedBy` bigint(20) UNSIGNED DEFAULT NULL,
  `LabRequisition` bigint(20) UNSIGNED DEFAULT NULL,
  `LabSampleCollection` bigint(20) UNSIGNED DEFAULT NULL,
  `Encounter` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kccaclinic`
--

CREATE TABLE `kccaclinic` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labrequisition`
--

CREATE TABLE `labrequisition` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `OrderDate` date DEFAULT NULL,
  `OrderedTime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CollectedDate` date DEFAULT NULL,
  `CollectedBy` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ClinicalNotes` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SampleCollected` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Approved` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ApprovedBy` int(11) DEFAULT NULL,
  `PendingApproval` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Patient` bigint(20) UNSIGNED DEFAULT NULL,
  `OrderedBy` bigint(20) UNSIGNED DEFAULT NULL,
  `Encounter` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labrequisitionlabtest`
--

CREATE TABLE `labrequisitionlabtest` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `LabRequisition` bigint(20) UNSIGNED DEFAULT NULL,
  `LabTest` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labrequisitionsampletype`
--

CREATE TABLE `labrequisitionsampletype` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `SampleType` int(11) DEFAULT NULL,
  `OtherSampleType` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LabRequisition` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labsamplecollection`
--

CREATE TABLE `labsamplecollection` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `CollectedDate` date DEFAULT NULL,
  `IsGeneralRequisition` int(11) DEFAULT NULL,
  `IsHIVScreening` int(11) DEFAULT NULL,
  `IsCoreLabRequisition` int(11) DEFAULT NULL,
  `LabRequisition` bigint(20) UNSIGNED DEFAULT NULL,
  `CollectedBy` bigint(20) UNSIGNED DEFAULT NULL,
  `Patient` bigint(20) UNSIGNED DEFAULT NULL,
  `Encounter` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labtest`
--

CREATE TABLE `labtest` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `TestName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RequiresApproval` int(11) DEFAULT NULL,
  `TypeOfLabTest` int(11) DEFAULT NULL,
  `Sample` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labtest`
--

INSERT INTO `labtest` (`OID`, `TestName`, `RequiresApproval`, `TypeOfLabTest`, `Sample`, `created_at`, `updated_at`) VALUES
(1, 'CBD', NULL, NULL, 1, '2020-11-10 08:13:36', '2020-11-10 08:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Store` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_02_04_083817_create_users_table', 1),
(2, '2020_02_28_093622_create_ChartLocation_table', 1),
(3, '2020_02_28_094011_create_Country_table', 1),
(4, '2020_02_28_094147_create_District_table', 1),
(5, '2020_02_28_094911_create_County_table', 1),
(6, '2020_02_28_095115_create_SubCounty_table', 1),
(7, '2020_02_28_095312_create_Parish_table', 1),
(8, '2020_02_28_095521_create_Village_table', 1),
(9, '2020_02_28_095705_create_Tribe_table', 1),
(10, '2020_02_28_095845_create_Referral_table', 1),
(11, '2020_02_28_100022_create_Religion_table', 1),
(12, '2020_02_28_101337_create_KCCAClinic_table', 1),
(13, '2020_02_28_110116_create_DSDMType_table', 1),
(14, '2020_02_28_110216_create_Clinician_table', 1),
(15, '2020_02_28_110216_create_patients_table', 1),
(16, '2020_02_28_110217_create_file_data_table', 1),
(17, '2020_03_11_055937_create_PhoneDetails_table', 1),
(18, '2020_03_18_082317_create_permission_tables', 1),
(19, '2020_04_09_042244_create_encounter_tables', 1),
(20, '2020_05_08_060710_create_regimen_table', 1),
(21, '2020_05_08_090613_create_prescription_table', 1),
(22, '2020_05_08_110215_create_Store_table', 1),
(23, '2020_05_08_110620_create_Schedule_table', 1),
(24, '2020_05_08_110835_create_Drug_table', 1),
(25, '2020_05_08_124839_create_FundingSource_table', 1),
(26, '2020_05_08_124915_create_Location_table', 1),
(27, '2020_05_08_124943_create_ProductGroup_table', 1),
(28, '2020_05_08_125010_create_Condition_table', 1),
(29, '2020_05_08_125041_create_UnitDescription_table', 1),
(30, '2020_05_08_125055_create_UnitOfMeasurement_table', 1),
(31, '2020_05_08_125755_create_StockItem_table', 1),
(32, '2020_05_08_125757_create_prescriptionItem_table', 1),
(33, '2020_05_13_075055_encounter_appointment_table', 1),
(34, '2020_05_20_091244_create_drug_regimen_table', 1),
(35, '2020_06_08_052123_create_LabRequisition_table', 1),
(36, '2020_06_08_055325_create_SampleType_table', 1),
(37, '2020_06_08_062846_create_LabTest_table', 1),
(38, '2020_06_08_062916_create_LabRequisitionSampleType_table', 1),
(39, '2020_06_08_063032_create_LabRequisitionLabTest_table', 1),
(40, '2020_06_08_063107_create_LabSampleCollection_table', 1),
(41, '2020_06_12_123439_create_notifications_table', 1),
(42, '2020_06_16_101130_create_triage_table', 1),
(43, '2020_06_24_133900_create_GeneralRequisitionResult_table', 1),
(44, '2020_06_24_134002_create_HIVScreeningRequisitionResult_table', 1),
(45, '2020_09_18_111418_create_settings_table', 1),
(46, '2020_10_03_121015_create_flowheet_table', 1),
(47, '2020_10_20_102312_create_appointments_table', 1),
(48, '2020_10_20_114541_create_appointments_reason_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'Modules\\User\\Entities\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parish`
--

CREATE TABLE `parish` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SubCounty` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parish`
--

INSERT INTO `parish` (`OID`, `Name`, `SubCounty`, `created_at`, `updated_at`) VALUES
(1, 'bwaise', 1, '2020-11-09 18:16:45', '2020-11-09 18:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `IDCNO` bigint(20) UNSIGNED NOT NULL,
  `RegistrationDate` date DEFAULT NULL,
  `FirstName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Surname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MiddleName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Initial` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `MaritalStatus` int(11) DEFAULT NULL,
  `FollowUpStatus` int(11) DEFAULT 1,
  `FollowUpStatusSpecify` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FollowUpStatusDate` date DEFAULT NULL,
  `Street` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Remarks` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IDCardProduced` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `IDCardDate` date DEFAULT NULL,
  `FingerprintDescription` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherReferral` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tribe` bigint(20) UNSIGNED DEFAULT NULL,
  `Referral` bigint(20) UNSIGNED DEFAULT NULL,
  `Country` bigint(20) UNSIGNED DEFAULT NULL,
  `District` bigint(20) UNSIGNED DEFAULT NULL,
  `County` bigint(20) UNSIGNED DEFAULT NULL,
  `SubCounty` bigint(20) UNSIGNED DEFAULT NULL,
  `Parish` bigint(20) UNSIGNED DEFAULT NULL,
  `Village` bigint(20) UNSIGNED DEFAULT NULL,
  `ChartStatus` int(11) DEFAULT NULL,
  `ChartLocation` bigint(20) UNSIGNED DEFAULT NULL,
  `Religion` bigint(20) UNSIGNED DEFAULT NULL,
  `SpecifyKCCAClinic` bigint(20) UNSIGNED DEFAULT NULL,
  `ReferralLetter` int(11) DEFAULT NULL,
  `Provider` bigint(20) UNSIGNED DEFAULT NULL,
  `Zone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LandLord` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ProminentLeader` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NeighbourFeature` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CommonName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IDIStaffIndentification` int(11) DEFAULT NULL,
  `OtherIDIStaffIndentification` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ProblemWithVisting` int(11) DEFAULT NULL,
  `DetailedDirection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`IDCNO`, `RegistrationDate`, `FirstName`, `Surname`, `MiddleName`, `Initial`, `BirthDate`, `Gender`, `MaritalStatus`, `FollowUpStatus`, `FollowUpStatusSpecify`, `FollowUpStatusDate`, `Street`, `Remarks`, `IDCardProduced`, `IDCardDate`, `FingerprintDescription`, `OtherReferral`, `Tribe`, `Referral`, `Country`, `District`, `County`, `SubCounty`, `Parish`, `Village`, `ChartStatus`, `ChartLocation`, `Religion`, `SpecifyKCCAClinic`, `ReferralLetter`, `Provider`, `Zone`, `LandLord`, `ProminentLeader`, `NeighbourFeature`, `CommonName`, `IDIStaffIndentification`, `OtherIDIStaffIndentification`, `ProblemWithVisting`, `DetailedDirection`, `created_at`, `updated_at`) VALUES
(1, '2020-02-28', 'Lambert', 'Byarugaba', NULL, 'BL', '1991-06-20', 2, 2, 1, NULL, NULL, 'a', NULL, '0', NULL, NULL, NULL, 1, NULL, 1, 1, 1, 1, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, 2, NULL, NULL, '2020-11-10 08:17:42'),
(2, '2020-03-02', 'System', 'Administrator', NULL, 'SA', NULL, 1, 3, 2, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit demographics', 'web', NULL, NULL),
(2, 'view users', 'web', NULL, NULL),
(3, 'edit users', 'web', NULL, NULL),
(4, 'delete users', 'web', NULL, NULL),
(5, 'add clients', 'web', NULL, NULL),
(6, 'view clients', 'web', NULL, NULL),
(7, 'edit clients', 'web', NULL, NULL),
(8, 'delete clients', 'web', NULL, NULL),
(9, 'manage inventory', 'web', NULL, NULL),
(10, 'manage encounters', 'web', NULL, NULL),
(11, 'manage prescriptions', 'web', NULL, NULL),
(12, 'make lab requests', 'web', NULL, NULL),
(13, 'view lab requests', 'web', NULL, NULL),
(14, 'collect lab samples', 'web', NULL, NULL),
(15, 'enter lab results', 'web', NULL, NULL),
(16, 'administrator', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phonedetails`
--

CREATE TABLE `phonedetails` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `PhoneNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Patient` bigint(20) UNSIGNED DEFAULT NULL,
  `Relationship` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SelfContact` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `FirstName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Surname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CanBeContacted` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `HaveDisclosed` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `TamaNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TAMACategory` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phonedetails`
--

INSERT INTO `phonedetails` (`OID`, `PhoneNumber`, `Description`, `Patient`, `Relationship`, `SelfContact`, `FirstName`, `Surname`, `CanBeContacted`, `HaveDisclosed`, `TamaNumber`, `TAMACategory`, `created_at`, `updated_at`) VALUES
(1, '0789563172', NULL, 1, NULL, '1', NULL, NULL, '0', '0', NULL, NULL, '2020-11-10 08:17:38', '2020-11-10 08:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `PrescriptionDate` date DEFAULT NULL,
  `Patient` bigint(20) UNSIGNED DEFAULT NULL,
  `ParentPrescription` bigint(20) UNSIGNED DEFAULT NULL,
  `Provider` bigint(20) UNSIGNED DEFAULT NULL,
  `Encounter` bigint(20) UNSIGNED DEFAULT NULL,
  `ArtRegimen` bigint(20) UNSIGNED DEFAULT NULL,
  `idcnoForConversion` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitnoForConversion` int(11) DEFAULT NULL,
  `prescriptionIDForConversion` int(11) DEFAULT NULL,
  `Notes` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DatePrinted` date DEFAULT NULL,
  `PrescriptionMonths` int(11) DEFAULT NULL,
  `PharmacyVisit` int(11) DEFAULT NULL,
  `AntibioticReason` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DSDM_Type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptionitem`
--

CREATE TABLE `prescriptionitem` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Quantity` double(8,2) DEFAULT NULL,
  `NoOfDays` int(11) DEFAULT NULL,
  `IssuedDate` date DEFAULT NULL,
  `Prescription` bigint(20) UNSIGNED DEFAULT NULL,
  `Drug` bigint(20) UNSIGNED DEFAULT NULL,
  `Schedule` bigint(20) UNSIGNED DEFAULT NULL,
  `IssuedBy` bigint(20) UNSIGNED DEFAULT NULL,
  `DispensingUnit` bigint(20) UNSIGNED DEFAULT NULL,
  `StockItem` bigint(20) UNSIGNED DEFAULT NULL,
  `PharmacistIssueNotes` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UnitPrice` double(8,2) DEFAULT NULL,
  `PMargin` double(8,2) DEFAULT NULL,
  `TotalCost` double(8,2) DEFAULT NULL,
  `QtyIssued` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productgroup`
--

CREATE TABLE `productgroup` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Specifiable` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regimen`
--

CREATE TABLE `regimen` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FormattedCode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  `OnPrePrinted` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regimen`
--

INSERT INTO `regimen` (`OID`, `Code`, `FormattedCode`, `Type`, `OnPrePrinted`, `created_at`, `updated_at`) VALUES
(1, 'C30', NULL, 1, NULL, '2020-11-13 20:09:38', '2020-11-13 20:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`OID`, `Name`, `created_at`, `updated_at`) VALUES
(1, 'Catholic', '2020-11-10 08:13:04', '2020-11-10 08:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sampletype`
--

CREATE TABLE `sampletype` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sampletype`
--

INSERT INTO `sampletype` (`OID`, `Name`, `created_at`, `updated_at`) VALUES
(1, 'Blood', NULL, NULL),
(2, 'Aspirate', NULL, NULL),
(3, 'Urine', NULL, NULL),
(4, 'Sputum', NULL, NULL),
(5, 'Stool', NULL, NULL),
(6, 'Breast Milk', NULL, NULL),
(7, 'Cervical Swab', NULL, NULL),
(8, 'Urethral Swab', NULL, NULL),
(9, 'Vaginal Swab', NULL, NULL),
(10, 'Biopsy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Frequency` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`OID`, `Name`, `Description`, `url`, `Status`, `created_at`, `updated_at`) VALUES
(1, 'Return Appointments', 'If enabled, some functions will depend on whether a return appointment is assigned to a client', '{{route(\"rasetting\")}}', 'Enabled', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stockitem`
--

CREATE TABLE `stockitem` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `BarCode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsDrug` int(11) DEFAULT NULL,
  `FundingSource` bigint(20) UNSIGNED DEFAULT NULL,
  `UnitDescription` bigint(20) UNSIGNED DEFAULT NULL,
  `Drug` bigint(20) UNSIGNED DEFAULT NULL,
  `Location` bigint(20) UNSIGNED DEFAULT NULL,
  `UnitOfMeasurement` bigint(20) UNSIGNED DEFAULT NULL,
  `ProductGroup` bigint(20) UNSIGNED DEFAULT NULL,
  `StorageCondition` bigint(20) UNSIGNED DEFAULT NULL,
  `UnitsOfIssue` double(8,2) DEFAULT NULL,
  `QPU` double(8,2) DEFAULT NULL,
  `MinStockLevel` double(8,2) DEFAULT NULL,
  `MaxStockLevel` double(8,2) DEFAULT NULL,
  `Active` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsMain` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Active` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcounty`
--

CREATE TABLE `subcounty` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `County` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcounty`
--

INSERT INTO `subcounty` (`OID`, `Name`, `County`, `created_at`, `updated_at`) VALUES
(1, 'Bwaise', 1, '2020-11-09 18:15:34', '2020-11-09 18:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `triage`
--

CREATE TABLE `triage` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `TriageDate` date DEFAULT NULL,
  `Patient` bigint(20) UNSIGNED DEFAULT NULL,
  `Provider` bigint(20) UNSIGNED DEFAULT NULL,
  `Encounter` bigint(20) UNSIGNED DEFAULT NULL,
  `BPHigh` double(8,2) DEFAULT NULL,
  `BPLow` double(8,2) DEFAULT NULL,
  `Temperatue` double(8,2) DEFAULT NULL,
  `Weight` double(8,2) DEFAULT NULL,
  `Height` double(8,2) DEFAULT NULL,
  `MUAC` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tribe`
--

CREATE TABLE `tribe` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tribe`
--

INSERT INTO `tribe` (`OID`, `Name`, `created_at`, `updated_at`) VALUES
(1, 'Muganda', '2020-11-10 08:12:50', '2020-11-10 08:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `unitdescription`
--

CREATE TABLE `unitdescription` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ShortName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unitofmeasurement`
--

CREATE TABLE `unitofmeasurement` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ShortName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Decomposable` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `FirstName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EmailAddress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsApproved` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `IsLockedOut` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `LastActivityDate` datetime DEFAULT NULL,
  `LastloginDate` datetime DEFAULT NULL,
  `Clinician` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`OID`, `FirstName`, `LastName`, `EmailAddress`, `username`, `password`, `IsApproved`, `IsLockedOut`, `LastActivityDate`, `LastloginDate`, `Clinician`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'System', 'Administrator', 'lbyarugaba@idi.co.ug', 'admin', '$2y$10$aK7xRU87dCg6IOb5lt1/jePdGqfSmYZXwEdDYna5.FWaVpikupqYC', '1', '0', '2020-11-30 19:26:08', '2020-11-30 19:26:08', NULL, NULL, NULL, NULL),
(2, 'Lambert', 'Byarugaba', 'lbyarugaba@gmail.com', 'lbyarugaba', '$2y$10$yaSqzY3ersh5F/MdMQFjquiycRfb9VswEjzzAOU39wZumJwKs59JC', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Test', 'User', 'testuser@idi.co.ug', 'user', '$2y$10$UchclTwW2h.DZAguP9N6vOpR0ZZlejrc8d35kZLk/CUMuuhwBe.eG', '0', '0', NULL, NULL, NULL, NULL, '2020-11-30 16:22:34', '2020-11-30 16:22:34'),
(4, 'Test', 'User 1', 'testuser1@idi.co.ug', 'user1', '$2y$10$jK1GOFPKQvZCjv1SXSngr.ddO5AFFIzI8sQm4FXselH91.hnDiHPW', '0', '0', NULL, NULL, NULL, NULL, '2020-11-30 16:24:25', '2020-11-30 16:24:25'),
(5, 'Test', 'User2', 'testuser2@idi.co.ug', 'user2', '$2y$10$kxgxHAwTj0fIugpkC/XIwedMQy4kJIGIPZwpoJ4DyLl5Yxjt4jmbS', '0', '0', NULL, NULL, NULL, NULL, '2020-11-30 16:25:25', '2020-11-30 16:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `OID` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Parish` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `appointments_patient_index` (`Patient`),
  ADD KEY `appointments_returnreason_index` (`ReturnReason`);

--
-- Indexes for table `appointment_type`
--
ALTER TABLE `appointment_type`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `chartlocation`
--
ALTER TABLE `chartlocation`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `clinician`
--
ALTER TABLE `clinician`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `condition`
--
ALTER TABLE `condition`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `county_district_index` (`District`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `district_country_index` (`Country`);

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `dsdmtype`
--
ALTER TABLE `dsdmtype`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `encounter`
--
ALTER TABLE `encounter`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `encounter_patient_index` (`Patient`),
  ADD KEY `encounter_visitreason_index` (`VisitReason`);

--
-- Indexes for table `filedata`
--
ALTER TABLE `filedata`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `filedata_patient_index` (`Patient`);

--
-- Indexes for table `flowsheet`
--
ALTER TABLE `flowsheet`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `flowsheet_patient_index` (`Patient`),
  ADD KEY `flowsheet_provider_index` (`Provider`),
  ADD KEY `flowsheet_encounter_index` (`Encounter`),
  ADD KEY `flowsheet_regimen_index` (`Regimen`),
  ADD KEY `flowsheet_dsdmtype_index` (`DSDMType`),
  ADD KEY `flowsheet_artsource_index` (`ARTSource`);

--
-- Indexes for table `fundingsource`
--
ALTER TABLE `fundingsource`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `generalrequisitionresult`
--
ALTER TABLE `generalrequisitionresult`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `generalrequisitionresult_patient_index` (`Patient`),
  ADD KEY `generalrequisitionresult_testedby_index` (`TestedBy`),
  ADD KEY `generalrequisitionresult_labrequisition_index` (`LabRequisition`),
  ADD KEY `generalrequisitionresult_labsamplecollection_index` (`LabSampleCollection`),
  ADD KEY `generalrequisitionresult_encounter_index` (`Encounter`);

--
-- Indexes for table `hivscreeningrequisitionresult`
--
ALTER TABLE `hivscreeningrequisitionresult`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `hivscreeningrequisitionresult_patient_index` (`Patient`),
  ADD KEY `hivscreeningrequisitionresult_testedby_index` (`TestedBy`),
  ADD KEY `hivscreeningrequisitionresult_labrequisition_index` (`LabRequisition`),
  ADD KEY `hivscreeningrequisitionresult_labsamplecollection_index` (`LabSampleCollection`),
  ADD KEY `hivscreeningrequisitionresult_encounter_index` (`Encounter`);

--
-- Indexes for table `kccaclinic`
--
ALTER TABLE `kccaclinic`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `labrequisition`
--
ALTER TABLE `labrequisition`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `labrequisition_patient_index` (`Patient`),
  ADD KEY `labrequisition_orderedby_index` (`OrderedBy`),
  ADD KEY `labrequisition_encounter_index` (`Encounter`);

--
-- Indexes for table `labrequisitionlabtest`
--
ALTER TABLE `labrequisitionlabtest`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `labrequisitionlabtest_labrequisition_index` (`LabRequisition`),
  ADD KEY `labrequisitionlabtest_labtest_index` (`LabTest`);

--
-- Indexes for table `labrequisitionsampletype`
--
ALTER TABLE `labrequisitionsampletype`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `labsamplecollection`
--
ALTER TABLE `labsamplecollection`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `labsamplecollection_labrequisition_index` (`LabRequisition`),
  ADD KEY `labsamplecollection_collectedby_index` (`CollectedBy`),
  ADD KEY `labsamplecollection_patient_index` (`Patient`),
  ADD KEY `labsamplecollection_encounter_index` (`Encounter`);

--
-- Indexes for table `labtest`
--
ALTER TABLE `labtest`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `labtest_sample_index` (`Sample`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `location_store_index` (`Store`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `parish`
--
ALTER TABLE `parish`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `parish_subcounty_index` (`SubCounty`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`IDCNO`),
  ADD KEY `patient_tribe_index` (`Tribe`),
  ADD KEY `patient_referral_index` (`Referral`),
  ADD KEY `patient_country_index` (`Country`),
  ADD KEY `patient_district_index` (`District`),
  ADD KEY `patient_county_index` (`County`),
  ADD KEY `patient_subcounty_index` (`SubCounty`),
  ADD KEY `patient_parish_index` (`Parish`),
  ADD KEY `patient_village_index` (`Village`),
  ADD KEY `patient_chartlocation_index` (`ChartLocation`),
  ADD KEY `patient_religion_index` (`Religion`),
  ADD KEY `patient_specifykccaclinic_index` (`SpecifyKCCAClinic`),
  ADD KEY `patient_provider_index` (`Provider`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phonedetails`
--
ALTER TABLE `phonedetails`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `phonedetails_patient_index` (`Patient`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `prescription_patient_index` (`Patient`),
  ADD KEY `prescription_parentprescription_index` (`ParentPrescription`),
  ADD KEY `prescription_provider_index` (`Provider`),
  ADD KEY `prescription_encounter_index` (`Encounter`),
  ADD KEY `prescription_artregimen_index` (`ArtRegimen`);

--
-- Indexes for table `prescriptionitem`
--
ALTER TABLE `prescriptionitem`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `prescriptionitem_prescription_index` (`Prescription`),
  ADD KEY `prescriptionitem_drug_index` (`Drug`),
  ADD KEY `prescriptionitem_schedule_index` (`Schedule`),
  ADD KEY `prescriptionitem_issuedby_index` (`IssuedBy`),
  ADD KEY `prescriptionitem_dispensingunit_index` (`DispensingUnit`),
  ADD KEY `prescriptionitem_stockitem_index` (`StockItem`);

--
-- Indexes for table `productgroup`
--
ALTER TABLE `productgroup`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `regimen`
--
ALTER TABLE `regimen`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sampletype`
--
ALTER TABLE `sampletype`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `stockitem`
--
ALTER TABLE `stockitem`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `stockitem_fundingsource_index` (`FundingSource`),
  ADD KEY `stockitem_unitdescription_index` (`UnitDescription`),
  ADD KEY `stockitem_drug_index` (`Drug`),
  ADD KEY `stockitem_location_index` (`Location`),
  ADD KEY `stockitem_unitofmeasurement_index` (`UnitOfMeasurement`),
  ADD KEY `stockitem_productgroup_index` (`ProductGroup`),
  ADD KEY `stockitem_storagecondition_index` (`StorageCondition`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `subcounty`
--
ALTER TABLE `subcounty`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `subcounty_county_index` (`County`);

--
-- Indexes for table `triage`
--
ALTER TABLE `triage`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `triage_patient_index` (`Patient`),
  ADD KEY `triage_provider_index` (`Provider`),
  ADD KEY `triage_encounter_index` (`Encounter`);

--
-- Indexes for table `tribe`
--
ALTER TABLE `tribe`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `unitdescription`
--
ALTER TABLE `unitdescription`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `unitofmeasurement`
--
ALTER TABLE `unitofmeasurement`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`OID`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `village_parish_index` (`Parish`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment_type`
--
ALTER TABLE `appointment_type`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chartlocation`
--
ALTER TABLE `chartlocation`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinician`
--
ALTER TABLE `clinician`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `condition`
--
ALTER TABLE `condition`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `county`
--
ALTER TABLE `county`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dsdmtype`
--
ALTER TABLE `dsdmtype`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `encounter`
--
ALTER TABLE `encounter`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `filedata`
--
ALTER TABLE `filedata`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flowsheet`
--
ALTER TABLE `flowsheet`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fundingsource`
--
ALTER TABLE `fundingsource`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `generalrequisitionresult`
--
ALTER TABLE `generalrequisitionresult`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hivscreeningrequisitionresult`
--
ALTER TABLE `hivscreeningrequisitionresult`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kccaclinic`
--
ALTER TABLE `kccaclinic`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labrequisition`
--
ALTER TABLE `labrequisition`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labrequisitionlabtest`
--
ALTER TABLE `labrequisitionlabtest`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labrequisitionsampletype`
--
ALTER TABLE `labrequisitionsampletype`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labsamplecollection`
--
ALTER TABLE `labsamplecollection`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labtest`
--
ALTER TABLE `labtest`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `parish`
--
ALTER TABLE `parish`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `IDCNO` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `phonedetails`
--
ALTER TABLE `phonedetails`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptionitem`
--
ALTER TABLE `prescriptionitem`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productgroup`
--
ALTER TABLE `productgroup`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regimen`
--
ALTER TABLE `regimen`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sampletype`
--
ALTER TABLE `sampletype`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stockitem`
--
ALTER TABLE `stockitem`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcounty`
--
ALTER TABLE `subcounty`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `triage`
--
ALTER TABLE `triage`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tribe`
--
ALTER TABLE `tribe`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unitdescription`
--
ALTER TABLE `unitdescription`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unitofmeasurement`
--
ALTER TABLE `unitofmeasurement`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
  MODIFY `OID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_patient_foreign` FOREIGN KEY (`Patient`) REFERENCES `patient` (`IDCNO`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_returnreason_foreign` FOREIGN KEY (`ReturnReason`) REFERENCES `appointment_type` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `county`
--
ALTER TABLE `county`
  ADD CONSTRAINT `county_district_foreign` FOREIGN KEY (`District`) REFERENCES `district` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_country_foreign` FOREIGN KEY (`Country`) REFERENCES `country` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `encounter`
--
ALTER TABLE `encounter`
  ADD CONSTRAINT `encounter_patient_foreign` FOREIGN KEY (`Patient`) REFERENCES `patient` (`IDCNO`) ON DELETE CASCADE,
  ADD CONSTRAINT `encounter_visitreason_foreign` FOREIGN KEY (`VisitReason`) REFERENCES `appointment_type` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `filedata`
--
ALTER TABLE `filedata`
  ADD CONSTRAINT `filedata_patient_foreign` FOREIGN KEY (`Patient`) REFERENCES `patient` (`IDCNO`) ON DELETE CASCADE;

--
-- Constraints for table `flowsheet`
--
ALTER TABLE `flowsheet`
  ADD CONSTRAINT `flowsheet_artsource_foreign` FOREIGN KEY (`ARTSource`) REFERENCES `fundingsource` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `flowsheet_dsdmtype_foreign` FOREIGN KEY (`DSDMType`) REFERENCES `dsdmtype` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `flowsheet_encounter_foreign` FOREIGN KEY (`Encounter`) REFERENCES `encounter` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `flowsheet_patient_foreign` FOREIGN KEY (`Patient`) REFERENCES `patient` (`IDCNO`) ON DELETE CASCADE,
  ADD CONSTRAINT `flowsheet_provider_foreign` FOREIGN KEY (`Provider`) REFERENCES `users` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `flowsheet_regimen_foreign` FOREIGN KEY (`Regimen`) REFERENCES `regimen` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `generalrequisitionresult`
--
ALTER TABLE `generalrequisitionresult`
  ADD CONSTRAINT `generalrequisitionresult_encounter_foreign` FOREIGN KEY (`Encounter`) REFERENCES `encounter` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `generalrequisitionresult_labrequisition_foreign` FOREIGN KEY (`LabRequisition`) REFERENCES `labrequisition` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `generalrequisitionresult_labsamplecollection_foreign` FOREIGN KEY (`LabSampleCollection`) REFERENCES `labsamplecollection` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `generalrequisitionresult_patient_foreign` FOREIGN KEY (`Patient`) REFERENCES `patient` (`IDCNO`) ON DELETE CASCADE,
  ADD CONSTRAINT `generalrequisitionresult_testedby_foreign` FOREIGN KEY (`TestedBy`) REFERENCES `users` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `hivscreeningrequisitionresult`
--
ALTER TABLE `hivscreeningrequisitionresult`
  ADD CONSTRAINT `hivscreeningrequisitionresult_encounter_foreign` FOREIGN KEY (`Encounter`) REFERENCES `encounter` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `hivscreeningrequisitionresult_labrequisition_foreign` FOREIGN KEY (`LabRequisition`) REFERENCES `labrequisition` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `hivscreeningrequisitionresult_labsamplecollection_foreign` FOREIGN KEY (`LabSampleCollection`) REFERENCES `labsamplecollection` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `hivscreeningrequisitionresult_patient_foreign` FOREIGN KEY (`Patient`) REFERENCES `patient` (`IDCNO`) ON DELETE CASCADE,
  ADD CONSTRAINT `hivscreeningrequisitionresult_testedby_foreign` FOREIGN KEY (`TestedBy`) REFERENCES `users` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `labrequisition`
--
ALTER TABLE `labrequisition`
  ADD CONSTRAINT `labrequisition_encounter_foreign` FOREIGN KEY (`Encounter`) REFERENCES `encounter` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `labrequisition_orderedby_foreign` FOREIGN KEY (`OrderedBy`) REFERENCES `users` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `labrequisition_patient_foreign` FOREIGN KEY (`Patient`) REFERENCES `patient` (`IDCNO`) ON DELETE CASCADE;

--
-- Constraints for table `labrequisitionlabtest`
--
ALTER TABLE `labrequisitionlabtest`
  ADD CONSTRAINT `labrequisitionlabtest_labrequisition_foreign` FOREIGN KEY (`LabRequisition`) REFERENCES `labrequisition` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `labrequisitionlabtest_labtest_foreign` FOREIGN KEY (`LabTest`) REFERENCES `labtest` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `labsamplecollection`
--
ALTER TABLE `labsamplecollection`
  ADD CONSTRAINT `labsamplecollection_collectedby_foreign` FOREIGN KEY (`CollectedBy`) REFERENCES `users` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `labsamplecollection_encounter_foreign` FOREIGN KEY (`Encounter`) REFERENCES `encounter` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `labsamplecollection_labrequisition_foreign` FOREIGN KEY (`LabRequisition`) REFERENCES `labrequisition` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `labsamplecollection_patient_foreign` FOREIGN KEY (`Patient`) REFERENCES `patient` (`IDCNO`) ON DELETE CASCADE;

--
-- Constraints for table `labtest`
--
ALTER TABLE `labtest`
  ADD CONSTRAINT `labtest_sample_foreign` FOREIGN KEY (`Sample`) REFERENCES `sampletype` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_store_foreign` FOREIGN KEY (`Store`) REFERENCES `store` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parish`
--
ALTER TABLE `parish`
  ADD CONSTRAINT `parish_subcounty_foreign` FOREIGN KEY (`SubCounty`) REFERENCES `subcounty` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_chartlocation_foreign` FOREIGN KEY (`ChartLocation`) REFERENCES `chartlocation` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_country_foreign` FOREIGN KEY (`Country`) REFERENCES `country` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_county_foreign` FOREIGN KEY (`County`) REFERENCES `county` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_district_foreign` FOREIGN KEY (`District`) REFERENCES `district` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_parish_foreign` FOREIGN KEY (`Parish`) REFERENCES `parish` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_provider_foreign` FOREIGN KEY (`Provider`) REFERENCES `users` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_referral_foreign` FOREIGN KEY (`Referral`) REFERENCES `referral` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_religion_foreign` FOREIGN KEY (`Religion`) REFERENCES `religion` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_specifykccaclinic_foreign` FOREIGN KEY (`SpecifyKCCAClinic`) REFERENCES `kccaclinic` (`OID`) ON DELETE SET NULL,
  ADD CONSTRAINT `patient_subcounty_foreign` FOREIGN KEY (`SubCounty`) REFERENCES `subcounty` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_tribe_foreign` FOREIGN KEY (`Tribe`) REFERENCES `tribe` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_village_foreign` FOREIGN KEY (`Village`) REFERENCES `village` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `phonedetails`
--
ALTER TABLE `phonedetails`
  ADD CONSTRAINT `phonedetails_patient_foreign` FOREIGN KEY (`Patient`) REFERENCES `patient` (`IDCNO`) ON DELETE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_artregimen_foreign` FOREIGN KEY (`ArtRegimen`) REFERENCES `regimen` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescription_encounter_foreign` FOREIGN KEY (`Encounter`) REFERENCES `encounter` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescription_parentprescription_foreign` FOREIGN KEY (`ParentPrescription`) REFERENCES `prescription` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescription_patient_foreign` FOREIGN KEY (`Patient`) REFERENCES `patient` (`IDCNO`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescription_provider_foreign` FOREIGN KEY (`Provider`) REFERENCES `clinician` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `prescriptionitem`
--
ALTER TABLE `prescriptionitem`
  ADD CONSTRAINT `prescriptionitem_dispensingunit_foreign` FOREIGN KEY (`DispensingUnit`) REFERENCES `store` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptionitem_drug_foreign` FOREIGN KEY (`Drug`) REFERENCES `drug` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptionitem_issuedby_foreign` FOREIGN KEY (`IssuedBy`) REFERENCES `clinician` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptionitem_prescription_foreign` FOREIGN KEY (`Prescription`) REFERENCES `prescription` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptionitem_schedule_foreign` FOREIGN KEY (`Schedule`) REFERENCES `schedule` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptionitem_stockitem_foreign` FOREIGN KEY (`StockItem`) REFERENCES `stockitem` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stockitem`
--
ALTER TABLE `stockitem`
  ADD CONSTRAINT `stockitem_drug_foreign` FOREIGN KEY (`Drug`) REFERENCES `drug` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `stockitem_fundingsource_foreign` FOREIGN KEY (`FundingSource`) REFERENCES `fundingsource` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `stockitem_location_foreign` FOREIGN KEY (`Location`) REFERENCES `location` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `stockitem_productgroup_foreign` FOREIGN KEY (`ProductGroup`) REFERENCES `productgroup` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `stockitem_storagecondition_foreign` FOREIGN KEY (`StorageCondition`) REFERENCES `condition` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `stockitem_unitdescription_foreign` FOREIGN KEY (`UnitDescription`) REFERENCES `unitdescription` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `stockitem_unitofmeasurement_foreign` FOREIGN KEY (`UnitOfMeasurement`) REFERENCES `unitofmeasurement` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `subcounty`
--
ALTER TABLE `subcounty`
  ADD CONSTRAINT `subcounty_county_foreign` FOREIGN KEY (`County`) REFERENCES `county` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `triage`
--
ALTER TABLE `triage`
  ADD CONSTRAINT `triage_encounter_foreign` FOREIGN KEY (`Encounter`) REFERENCES `encounter` (`OID`) ON DELETE CASCADE,
  ADD CONSTRAINT `triage_patient_foreign` FOREIGN KEY (`Patient`) REFERENCES `patient` (`IDCNO`) ON DELETE CASCADE,
  ADD CONSTRAINT `triage_provider_foreign` FOREIGN KEY (`Provider`) REFERENCES `users` (`OID`) ON DELETE CASCADE;

--
-- Constraints for table `village`
--
ALTER TABLE `village`
  ADD CONSTRAINT `village_parish_foreign` FOREIGN KEY (`Parish`) REFERENCES `parish` (`OID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
