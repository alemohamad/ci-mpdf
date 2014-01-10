# CodeIgniter Helper: PDF Export

**ci-mpdf**

## About this library

This CodeIgniter's Helper is used to create a PDF in real time and then export it to download it.  
It uses the MPDF Library, which is also in this repository.

Its usage is recommended for CodeIgniter 2 or greater.

## Usage

```php
$this->load->helper('pdfexport');

$data['title'] = "Annual Report"; // it can be any variable with content that the code will use

$fileName = date('YmdHis') . "_report";
$pdfView  = $this->load->view('pdf/pdf_template', $data, TRUE); // we need to use a view as PDF content
$cssView  = $this->load->view('pdf/pdf_template_css', NULL, TRUE); // the use a css stylesheet is optional

exportMeAsMPDF($fileName, $pdfView, $cssView, 'P'); // then define the content and filename
```

![Ale Mohamad](http://alemohamad.com/github/logo2012am.png)