<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<table>
    <tr style="background-color:#34ace0">
      <td><h2><span style="color:green"><span style="color:red">PHaKAL</span> Police Lines School & Collage</span></h2></td>
      <td>
        <p>Address:<span>Harivangga,Lalmonirhat</span></p>
        <p>Phone:<span>01727038318</span></p>
        <p>Email:<span>phakal@gmail.com</span></p>
      </td>
    </tr>

  </table>

<table>
  <tr style="background-color: #84817a">
    <th style="width: 10%">SL</th>
    <th style="width: 45%">Student Details</th>
    <th style="width: 45%">Student Data</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Student Name</td>
    <td>{{ $student_details['student']['name'] }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Father Name</td>
    <td>{{ $student_details['student']['fname'] }}</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Mother Name</td>
    <td>{{ $student_details['student']['mname'] }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td> Mobile Number</td>
    <td>{{ $student_details['student']['mobile'] }}</td>
  </tr>
  <tr>
    <td>5</td>
    <td>Address</td>
    <td>{{ $student_details['student']['address'] }}</td>
  </tr>
  <tr>
    <td>6</td>
    <td>Gender</td>
    <td>{{ $student_details['student']['gender'] }}</td>
  </tr>
  <tr>
    <td>7</td>
    <td> Religion</td>
    <td>{{ $student_details['student']['religion'] }}</td>
  </tr>
  <tr>
    <td>8</td>
    <td> Date of Birth</td>
    <td>{{ $student_details['student']['dob'] }}</td>
  </tr>
  <tr>
    <td>9</td>
    <td>Discount </td>
    <td>{{ $student_details['discount']['discount'] }} TK</td>
  </tr>
  <tr>
    <td>11</td>
    <td>Year </td>
    <td>{{ $student_details['student_year']['year'] }}</td>
  </tr>
  <tr>
    <td>12</td>
    <td>Class </td>
    <td>{{ $student_details['student_class']['class'] }}</td>
  </tr>
  <tr>
    <td>13</td>
    <td>Roll </td>
    <td>{{ $student_details['roll'] }}</td>
  </tr>
  <tr>
    <td>14</td>
    <td>Group </td>
    <td>{{ $student_details['group']['student_group'] }}</td>
  </tr>
  <tr>
    <td>15</td>
    <td>Shift </td>
    <td>{{ $student_details['shift']['shift'] }}</td>
  </tr>
</table>
<br>
<i style="font-size: 10px; float:right">Print date:{{ date("d M Y") }}</i>

</body>
</html>

