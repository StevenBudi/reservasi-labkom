<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\MemberLog;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->memberLogModel = new MemberLog();
    }
    public function index()
    {
        $data = [
            'path' => 'admin'
        ];
        return view('/admin/index.php', $data);
    }

    public function member_log()
    {
        if ($this->request->isAJAX()) {
            $result = [
                'list' => $this->memberLogModel->findAll()
            ];

            $hasil = [
                'data' => view('/admin/member_log', $result)
            ];

            return $this->response->setJSON($hasil);
        } else {
            exit('Data tidak dapat ditampilkan');
        }
    }

    public function export_member()
    {
        $data = $this->memberLogModel->findAll();
        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'User ID')
            ->setCellValue('C1', 'Action')
            ->setCellValue('D1', 'IP')
            ->setCellValue('E1', 'Waktu');

        $column = 2;
        foreach ($data as $item) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $column - 1)
                ->setCellValue('B' . $column, $item['user_id'])
                ->setCellValue('C' . $column, $item['action'])
                ->setCellValue('D' . $column, $item['ip'])
                ->setCellValue('E' . $column, $item['created_at']);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His') . 'Member Log';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        die;
    }
}
