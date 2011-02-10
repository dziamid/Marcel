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
    $sheet->setCellValue('B1', 'Сумма');
    $offset = 3;
    foreach ($data as $i => $item)
    {
      $sheet->setCellValue(sprintf('A%s',$i+$offset), $item->getMenuItem()->getName());
      
      $sheet->setCellValue(sprintf('B%s',$i+$offset), $item->getTotalSum());
    }
    
    // Add a drawing to the worksheet
    $objDrawing = new PHPExcel_Worksheet_Drawing();
    $objDrawing->setName('Logo');
    $objDrawing->setDescription('Logo');
    $objDrawing->setPath('/home/dziamid/dev/marcel/plugins/sfPhpExcelPlugin/examples_1_2/images/phpexcel_logo.gif');
    $objDrawing->setHeight(36);
    $objDrawing->setCoordinates('G1');
    $objDrawing->setWorksheet($workbook->getActiveSheet());

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    
    $this->workbook = $workbook;
    
  }
  public function save($filename = 'php://output')
  {
    // Save Excel 2007 file
    $writer = PHPExcel_IOFactory::createWriter($this->workbook, 'Excel2007');
    $writer->save($filename);
  }
}