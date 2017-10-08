<?php

class ExcelAction extends CommAction{
    function index (){
                //首先将要写入表格的数据都读入一个数组，比如 $datalist

                //读入操作这里省略 ......

                //以下开始写入excel
                //不知道为什么我的vendor方法引用不了 索性直接用  __DIR__  晕..  

 
                //Vendor('PHPExcel.phpexcel'); 
                require_once __DIR__.'/PHPExcel/phpexcel.php'; 
                $objPHPExcel = new PHPExcel(); 
                $objPHPExcel->getProperties()->setCreator("Da")
                                             ->setLastModifiedBy("Da")
                                             ->setTitle("Office 2007 XLSX Test Document")
                                             ->setSubject("Office 2007 XLSX Test Document")
                                             ->setDescription("Test document for Office 2007 XLSX, generated                                                                                  using  PHP classes.")
                                             ->setKeywords("office 2007 openxml php")
                                             ->setCategory("Test result file");
                $objPHPExcel->setActiveSheetIndex(0);                                                         
                $objPHPExcel->getActiveSheet(0)->setTitle('营销部门');
                //$objActSheet = $objExcel->getActiveSheet();  



                //设置宽度  默认大小  字体
                //$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
                //$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
                $objPHPExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(15);
                $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName('Arial');
                $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);


                $objPHPExcel->getActiveSheet(0)->setCellValue('A1','姓名');
                $objPHPExcel->getActiveSheet(0)->setCellValue('B1','组别');
                $objPHPExcel->getActiveSheet(0)->setCellValue('C1','诚信达现金进账');
                $objPHPExcel->getActiveSheet(0)->setCellValue('D1','在线销售抵充'); 
                spl_autoload_register(array('Think','autoload')); 
                foreach($datalist as $key => $value){ 
                        static $i = 2;
                        $name[$i]['nickname'] =  $value['nickname'];
                        $name[$i]['name'] =   $this->id_to_name((int)$value['id']);
                        $name[$i]['user_get_chengxinda'] =  $value['user_get_chengxinda'];
                        $name[$i]['user_get_online'] =  $value['user_get_online'];
                        $objPHPExcel->getActiveSheet(0)->setCellValue('A' . $i, $name[$i]['nickname']);
                        $objPHPExcel->getActiveSheet(0)->setCellValue('B' . $i, $name[$i]['name']);
                        $objPHPExcel->getActiveSheet(0)->setCellValue('C' . $i, $name[$i]['user_get_chengxinda']);
                        $objPHPExcel->getActiveSheet(0)->setCellValue('D' . $i, $name[$i]['user_get_online']); 
                        $i++;
                }
 
                //添加一个新的worksheet  综合部门
                $objPHPExcel->createSheet();  
                $objPHPExcel->getSheet(1)->setTitle('综合部门');
                $objPHPExcel->setActiveSheetIndex(1); 
//下面一段代码跟上面类似 就是新建一个sheet 
//---------------------------------------------------------------------------此处代码省略-------------------------------------------  
/*                 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
$objWriter->save(str_replace('.php', '.xls', __FILE__)); 
echo '导出成功';  
 */
                $filename = date('Y-m',time());
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename='.$filename.'.xls');
                header('Cache-Control: max-age=0');
                

                $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                $objWriter->save('php://output');  //这里生成excel后会弹出下载

                exit;
        }
}

?>
