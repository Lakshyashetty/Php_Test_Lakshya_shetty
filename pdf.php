<?php
ob_start();

include 'db.php';
require 'vendor/autoload.php';

$result = $conn->query("SELECT * FROM book");

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('courier', 'B', 12);
$pdf->Cell(0, 14, 'Book Table', 0, 1, 'C');

$html = '
<table border="1" cellpadding="4">
    <tr style="background-color: orange;">
        <th width="8%">BookId</th>
        <th width="18%">Book Title</th>
        <th width="18%">Author Name</th>
        <th width="18%">Genre</th>
        <th width="19%">Total Copies</th>
        <th width="19%">Available Copies</th>
    </tr>
';

while ($row = $result->fetch_assoc()) {
    $html .= '
    <tr>
        <td width="8%" align="center">' . $row['book_id'] . '</td>
        <td width="18%">' . $row['book_title'] . '</td>
        <td width="18%">' . $row['author_name'] . '</td>
        <td width="18%">' . $row['genre'] . '</td>
        <td width="19%" align="center">' . $row['total_copies'] . '</td>
        <td width="19%" align="center">' . $row['available_copies'] . '</td>
    </tr>
    ';
}

$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

ob_end_clean();
$pdf->Output('book.pdf', 'D');
exit;