<?php

class statDayReport extends sfPhpExcel
{
  protected $workbook;
  
  public function __construct($file_path)
  {
    parent::__construct();
    $this->workbook = PHPExcel_IOFactory::load($file_path);
   // $this->workbook = new sfPhpExcel();
  }
  public function create($data = Null)
  {
    $this->workbook->setActiveSheetIndex(0);
    $sheet = $this->workbook->getActiveSheet();

    $offset = 28;
    foreach ($data as $i => $item)
    {
      $sheet->setCellValue(sprintf('B%s',$i+$offset), $item->getMenuItem()->getName());
      //$sheet->setCellValue(sprintf('B%s',$i+$offset), $item->getMenuItem()->getGroup()->getTypeString());
      //$sheet->setCellValue(sprintf('C%s',$i+$offset), $item->getPrice());
      //$sheet->setCellValue(sprintf('D%s',$i+$offset), $item->getTotalQuantity());
      //$sheet->setCellValue(sprintf('E%s',$i+$offset), $item->getTotalSum());
    }
    //$sheet->setCellValue(sprintf('E%s',$i+$offset+1), sprintf('=SUM(E%s:E%s)',$offset,$i+$offset));
    
  }
  public function save($filename = 'php://output')
  {
    // Save Excel 2007 file
    $writer = PHPExcel_IOFactory::createWriter($this->workbook, 'Excel2007');
    $writer->save($filename);
  }
}