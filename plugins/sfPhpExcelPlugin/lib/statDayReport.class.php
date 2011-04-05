<?php

class statDayReport extends sfPhpExcel
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

    //group items by type
    $arr = array();
    foreach ($data as $item)
    {
      $type = $item->getMenuItem()->getGroup()->getType();
      $arr[$type][] = $item;
    }
    $line = 1;
    foreach ($arr as $i => $type)
    {
      $sheet->setCellValue(sprintf('A%s',$line), $type[0]->getMenuItem()->getGroup()->getTypeString());
      $line++;
      foreach ($type as $j => $item)
      {
        $sheet->setCellValue(sprintf('A%s',$line), $item->getMenuItem()->getName());
        $sheet->setCellValue(sprintf('B%s',$line), $item->getTotalQuantity());
        $sheet->setCellValue(sprintf('C%s',$line), $item->getPrice());
        $sheet->setCellValue(sprintf('D%s',$line), $item->getTotalSum());        
        $line++;
      }
      //margin between types
      $line++;
    }
    //$sheet->setCellValue(sprintf('E%s',$i+$offset+1), sprintf('=SUM(E%s:E%s)',$offset,$i+$offset));
    $this->workbook = $workbook;

  }
  public function save($filename = 'php://output')
  {
    // Save Excel 2007 file
    $writer = PHPExcel_IOFactory::createWriter($this->workbook, 'Excel2007');
    $writer->save($filename);
  }
}