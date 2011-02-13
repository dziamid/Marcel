<?php

class statReport extends sfPhpExcel
{
  protected $workbook;
  
  public function __construct()
  {
    parent::__construct();
    
  }
  public function create($data = Null)
  {
    // Create new PHPExcel object
    $workbook = new sfPhpExcel();
    $workbook->setActiveSheetIndex(0);
    $sheet = $workbook->getActiveSheet();
    $sheet->getColumnDimension('A')->setWidth(30);
    $sheet->setCellValue('A1', 'Наименование');
    $sheet->setCellValue('B1', 'Кухня/бар');
    $sheet->setCellValue('C1', 'Цена');
    $sheet->setCellValue('D1', 'Кол-во');
    $sheet->setCellValue('E1', 'Сумма');
    $offset = 3;
    foreach ($data as $i => $item)
    {
      $sheet->setCellValue(sprintf('A%s',$i+$offset), $item->getMenuItem()->getName());
      $sheet->setCellValue(sprintf('B%s',$i+$offset), $item->getMenuItem()->getGroup()->getTypeString());
      $sheet->setCellValue(sprintf('C%s',$i+$offset), $item->getPrice());
      $sheet->setCellValue(sprintf('D%s',$i+$offset), $item->getTotalQuantity());
      $sheet->setCellValue(sprintf('E%s',$i+$offset), $item->getTotalSum());
    }
    $sheet->setCellValue(sprintf('E%s',$i+$offset+1), sprintf('=SUM(E%s:E%s)',$offset,$i+$offset));
    $this->workbook = $workbook;
    
  }
  public function save($filename = 'php://output')
  {
    // Save Excel 2007 file
    $writer = PHPExcel_IOFactory::createWriter($this->workbook, 'Excel2007');
    $writer->save($filename);
  }
}