<?php

namespace App\Classes;

use Codedge\Fpdf\Fpdf\Fpdf;

class ResumeClass extends FPDF
{

    private $font = 'Arial';
    private $header_size = 16;
    private $font_size = 10;
    private $header_spacing = 8;
    private $section_spacing = 7;
    private $contact_info = [];
    public function __construct()
    {
        parent::__construct('P', 'mm', 'A4');
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
        $this->Cell(0, 0, ($this->contact_info['name']));
        $this->Ln(7);

        // Title
        $this->SetFont($this->font, 'B', $this->font_size);
        $this->Cell(0, 0, $this->contact_info['seeking'], 0, 1, 'l');
        $this->Ln(5);

        // Location
        $this->SetFont($this->font, '', $this->font_size);
        $this->Cell(0, 0, sprintf("%s, %s", $this->contact_info['city'], $this->contact_info['state']), 0, 1, 'l');

        // Links
        $this->SetFont('', 'U');
        $this->SetTextColor(0, 105, 255);
        $this->Cell(0, 9, $this->contact_info['email'], 0, 1, 'l', false, sprintf('mailto:%s', $this->contact_info['email']));
        $this->Cell(0, 0, $this->contact_info['github'], 0, 1, 'l', false, $this->contact_info['github']);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont('', '');
        $this->Ln(5);

        // Professional Summary
        $this->MultiCell(0, 5, $this->contact_info['summary']);
        $this->Ln(5);
    }
    public function projects($projects = [])
    {
        $this->AddPage();

        $this->Ln($this->section_spacing);
        $this->SetFont($this->font, '', $this->header_size);
        $this->Cell(0, 8, 'Projects', 'B', 1, 'l');
        $this->Ln($this->header_spacing);

        $this->SetFont($this->font, '', $this->font_size);
        foreach ($projects as $i => $project) {
            if ($i != 0) {
                $this->Ln(8);
            }
            $this->SetTextColor(0, 0, 0);
            $this->SetFont($this->font, 'B');
            $this->Cell(($this->GetPageWidth()), 5, $project['name'], 0);
            $this->Ln();
            $this->SetFont($this->font, '');
            $this->MultiCell(0, 5,  $project['description'], 0);
            $this->SetFont('', 'U');
            $this->SetTextColor(0, 105, 255);
            $this->Cell(($this->GetPageWidth()), 5,  $project['url'], 0, 0, 'L', false, $project['url']);
            $this->Ln();
        }
        $this->Ln();
    }
    public function jobs($jobs = [])
    {
        $this->Ln($this->section_spacing);
        $this->SetFont($this->font, '', $this->header_size);
        $this->Cell(0, 8, 'Work Experience', 'B', 1, 'l');
        $this->Ln($this->header_spacing);

        $this->SetFont($this->font, '', $this->font_size);
        foreach ($jobs as $i => $job) {
            if ($i != 0) {
                $this->Ln(7);
            }
            $this->SetFont($this->font, 'B', $this->font_size);
            $this->Cell(0, 5, $job['title'], 0);
            $this->SetFont($this->font, '', $this->font_size);
            $this->SetTextColor(100, 100, 100);
            $this->Ln();
            $this->Cell(0, 5, sprintf("%s - %s", $job['name'], $job['location']), 0);
            $this->Ln();
            $this->Cell(($this->GetPageWidth() / 3), 5, sprintf("%s - %s", $job['start_date'], $job['end_date'] ? $job['end_date'] : 'Present'), 0);
            $this->Ln(8);
            $this->SetTextColor(0, 0, 0);
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
        $this->SetFont($this->font, '', $this->header_size);
        $this->Cell(0, 8, 'Education', 'B', 1, 'l');
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
        $this->SetFont($this->font, '', $this->header_size);
        $this->Cell(0, 8, 'Skills', 'B', 1, 'l');
        $this->Ln($this->header_spacing);

        $this->SetFont($this->font, '', $this->font_size);
        $cols = 3;
        foreach ($skills as $i => $skill) {
            $this->Cell(($this->GetPageWidth() / $cols) - (40 / $cols), 7, $skill["name"] . ' (' . $skill["years"] . '+ years)', 0, $i % $cols === $cols - 1 ? 1 : 0, 'L');
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
