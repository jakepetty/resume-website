<?php

namespace App\Classes;

use Codedge\Fpdf\Fpdf\Fpdf;

class ResumeClass extends FPDF
{

    private $font = 'Arial';
    private $header_size = 16;
    private $font_size = 11;
    private $header_spacing = 8;
    private $section_spacing = 8;
    private $contact_info = [];
    public function __construct()
    {
        parent::__construct();
        $this->SetMargins(20, 20, 20, 20);
        $this->AddPage();
    }
    public function setContactInfo($data = [])
    {
        $this->contact_info = $data;
    }
    public function cover_letter($content = '')
    {

        $this->contact();
        $this->Ln($this->section_spacing);
        $this->SetFont($this->font, '', $this->font_size);
        $this->Cell(0, 0, date('F d, Y'));
        $this->Ln(10);
        $this->Write(7, trim($content));
        $this->AddPage();
    }
    public function contact()
    {
        $this->SetFont($this->font, 'B', $this->header_size);
        $this->SetTextColor(55, 55, 55);
        $this->Cell(0, 0, strtoupper($this->contact_info['name']), 0, 0, 'C');
        $this->Ln();
        $this->Line($this->GetPageWidth() - 20, 25, 20, 25);
        $this->Ln(10);
        $this->SetFont($this->font, null, $this->font_size);
        $this->Cell(0, 0, sprintf("%s %s, %s %s %s %s", $this->contact_info['street_address'], $this->contact_info['city'], $this->contact_info['state'], $this->contact_info['zip'], Chr(149), $this->contact_info['phone']), 0, 0, 'C');
        $this->Ln(5);
        $this->SetFont('', 'U');
        $this->SetTextColor(0, 105, 255);
        $this->Cell(($this->GetPageWidth() / 2) - 25, 0, $this->contact_info['email'], 0, 0, 'R', false, sprintf('mailto:%s', $this->contact_info['email']));
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('', '');
        $this->Cell(3, 0, chr(149));
        $this->SetFont('', 'U');
        $this->SetTextColor(0, 105, 255);
        $this->Cell(($this->GetPageWidth() / 2) - 20, 0, $this->contact_info['github'], 0, 0, 'L', false, $this->contact_info['github']);
        $this->SetTextColor(0, 0, 0);
        $this->Ln(5);
    }
    public function jobs($jobs = [])
    {
        $this->Ln($this->section_spacing);
        $this->SetFont($this->font, 'B', $this->header_size);
        $this->Cell(0, 0, 'WORK EXPERIENCE', 0, 0, 'C');
        $this->Ln($this->header_spacing);

        $this->SetFont($this->font, '', $this->font_size);
        foreach ($jobs as $i => $job) {
            if ($i != 0) {
                $this->Ln(7);
            }
            $this->Cell(($this->GetPageWidth() / 3), 5, $job['name'], 0);
            $this->Cell(($this->GetPageWidth() / 3), 5,  $job['location'], 0);
            $this->Cell(($this->GetPageWidth() / 3), 5,  sprintf("%s - %s", $job['start_date'], $job['end_date'] ? $job['end_date'] : 'Present'), 0);
            $this->Ln(8);
            $this->SetFont($this->font, 'B', $this->font_size);
            $this->Cell(0, 0, $job['title']);
            $this->SetFont($this->font, '', $this->font_size);
            $this->Ln(3);
            $this->MultiCell(0, 5, $job['description']);
            if ($job['duties']) {
                $this->Ln(5);
                $job["duties"] = explode("\n", $job['duties']);
                $this->SetMargins(25, 0, 20, 0);
                $this->Ln(0);
                foreach ($job["duties"] as $x => $duty) {
                    $this->Cell(3, 5, Chr(149));
                    $this->MultiCell(0, 5, $duty);
                }
                $this->SetMargins(20, 20, 20, 20);
            }
        }
        $this->Ln();
    }
    public function education($schools = [])
    {
        $this->Ln($this->section_spacing);
        $this->SetFont($this->font, 'B', $this->header_size);
        $this->Cell(0, 0, 'EDUCATION', 0, 0, 'C');
        $this->Ln($this->header_spacing);

        foreach ($schools as $i => $school) {
            $this->SetFont($this->font, '', $this->font_size);
            $this->Cell(($this->GetPageWidth() / 2), 5, $school['name'], 0);
            $this->Cell(($this->GetPageWidth() / 3), 5, $school['location'], 0);
            $this->Cell(0, 5, $school['year'], 0, 0, 'R');
            $this->Ln();
            $this->SetFont($this->font, 'B', $this->font_size);
            $this->Cell(($this->GetPageWidth() / 3), 5, $school['major'], 0);
            if ($i != count($schools)) {
                $this->Ln(7);
            }
        }
    }
    public function skills($skills = [])
    {
        $this->Ln($this->section_spacing);
        $this->SetFont($this->font, 'B', $this->header_size);
        $this->Cell(0, 0, 'SKILLS / EQUIPMENT', 0, 0, 'C');
        $this->Ln($this->header_spacing);

        $this->SetFont($this->font, '', $this->font_size);
        foreach ($skills as $i => $skill) {
            $this->Cell(($this->GetPageWidth() / 3), 7, chr(149) . ' ' . $skill, 0);
            if ($i % 3 === 2) {
                $this->Ln();
            }
        }
        $this->Ln();
    }
    public function sectionSeperator()
    {
        $this->Ln(20);
    }
    public function show()
    {
        $this->Output();
    }
}
