<?php

class Reciept_model extends CI_Model
{
    
    
    public function getCustomerdetails($caseId)
    {
        
        $sql   = "SELECT cm.caseId,cm.patientId,cm.collection_center,DATE_FORMAT(cm.createdat,'%d-%m-%Y') AS createddate,cm.updatedat,pm.first_name,pm.last_name,pm.gender,pm.contact_number,pm.emailId,crm.ref_name
        FROM case_master cm 
        INNER JOIN patient_master pm ON cm.patientId = pm.patientId
        LEFT JOIN center_reference_master crm ON crm.ref_id = cm.referenceId
        WHERE cm.caseId =$caseId";
        $query = $this->db->query($sql);
        //$data = $query->result_array();
        
        // $sql_logo    = "SELECT COALESCE(cd.header_logo,'resource/img/letter_head.png') as header_logo,COALESCE(cd.footer_logo,'resource/img/footer.png') as footer_logo FROM center_letter_head_details cd 
        //  LEFT JOIN case_master cm ON cm.centerId = cd.centerId WHERE cm.caseId = $caseId";
        // $query_1     = $this->db->query($sql_logo);
        // $row_1       = $query_1->result();
        // $header_logo = 'resource/img/letter_head.png';
        // if ($row_1['header_logo'] != null) {
        //     $header_logo = $row_1['header_logo'];
        // }

        $sql_5 = "SELECT COALESCE(cd.header_logo,'resource/img/letter_head.png') as footer_logo
        FROM center_letter_head_details cd 
       LEFT JOIN case_master cm ON cm.centerId = cd.centerId WHERE cm.caseId = $caseId";
        $query_5 = $this->db->query($sql_5);
         $header_logo = 'resource/img/letter_head.png'; 
        foreach ($query_5->result() as $row_5) {
         $header_logo =$row_5->footer_logo;
        }
        
        $output = '<link rel="stylesheet" href="dompdf/style.css">
        <style>
        footer {
          position: fixed; 
          bottom: 0cm; 
          left: 0cm; 
          right: 0cm;
          height: 2cm;
      }
        </style>
         <body class="hold-transition skin-blue layout-top-nav">
         <div class="wrapper">
         
           <div class="">
             <section class="">
               <div class="row invoice-info">
                 <div class="col-md-2">
                 </div>
                 <div class="col-sm-8 invoice-col invoice printableArea">
                     <center><img src="' . $header_logo . '" style="width: 815px;margin-top:-12%;"></center>
                     <br><div class="invoice-details row mx-0 my-15" style="width: 92%;margin-left: 4%;">
         <div class="table-responsive" style="background-color: #f8f4f4;">
               <table class="table" style="border: none !important; font-weight: 700!important;">';
        
        foreach ($query->result() as $row) {
            $output .= '
             <tr>
                      <td>
                          <h6>Invoice No: ' . $row->caseId . '</h6>
                            <h6>Invoice Date:' . $row->createddate . ' </h6>
                            <h6>PAN No.: </h6>
                        </td>
                      <td>
                          <h6>Patient Id: ' . $row->patientId . ' </h6>
                            <h6>Patient Name: ' . $row->first_name . ' ' . $row->last_name . ' </h6>
                            <h6>Patient Gender: ' . $row->gender . ' </h6>
                      </td>
                      <td>
                          <h6>Reffered By: ' . $row->ref_name . ' </h6>
                            <h6>Mob No: ' . $row->contact_number . ' </h6>
                            <h6>Email: ' . $row->emailId . ' </h6>
                      </td>
                  </tr>
             ';
        }
        
        $output .= '</table>
          </div>
      </div>';
        return $output;
    }
    
    public function getTestDetails($caseId)
    {
        
        $sql   = "SELECT ct.case_test_id,ct.testId,cm.test_name,cm.short_name,cm.fees,lc.category
        FROM case_tests ct INNER JOIN center_test_master cm ON ct.testId = cm.testId
        INNER JOIN lab_center_categories lc ON lc.categoryid = cm.categoryId
        WHERE caseId =$caseId";
        $query = $this->db->query($sql);
        
        $output = '<div class="table-responsive" style="width: 90%;margin-left: 5%;">
          <center><h4 style="background-color: #fff;margin-top: 2%;"><b>Bill Details</b></h4></center>
<table class="table table-bordered" style="background-color: #ffffffd4;">
          <thead>
          <tr>
            <th>Lab Investigations</th>
            <th>Fee</th>
          </tr>
          </thead>
          <tbody>';
        foreach ($query->result() as $row) {
            $output .= ' <tr>
            <td>' . $row->test_name . '</td>
            <td>' . number_format($row->fees, 2) . '</td>
          </tr>';
        }
        $output .= '</tbody></table></div>';
        return $output;
    }
    
    public function getPaymentDetails($caseId)
    {
        
        $sql   = "SELECT cp.total_amt,cp.amt_recieved,cp.discount,cp.pending_amt,ct.amount,ct.paymentdate,ct.paymentmode
        FROM case_payments cp INNER JOIN case_payment_transactions ct ON cp.paymentId = ct.paymentId
        WHERE cp.caseId = $caseId";
        $query = $this->db->query($sql);
        
        $output = '<div class="table-responsive" style="width: 90%;margin-left: 5%;">
          <center><h4 style="background-color: #fff;margin-top: 2%;"><b>Payment history</b></h4></center>
<table class="table table-bordered" style="background-color: #ffffffd4;">
          <thead>
          <tr>
            <th>Payment Date</th>
            <th>Amount Received</th>
          </tr>
          </thead>
          <tbody>';
        foreach ($query->result() as $row) {
            $output .= ' <tr>
            <td>' . $row->paymentdate . '</td>
            <td>' . number_format($row->amount, 2) . '</td>
          </tr>';
        }
        $output .= '</tbody></table></div>';
        return $output;
    }
    
    public function getPendingStatus($caseId)
    {
        $sql    = "SELECT cp.total_amt,cp.amt_recieved,cp.discount,cp.pending_amt FROM case_payments cp 
        WHERE cp.caseId = $caseId";
        $query  = $this->db->query($sql);
        $output = '';
        foreach ($query->result() as $row) {
            $discount = '';
            if ($row->discount > 0) {
                $discount = ' <tr>
                    <th>Discount</th>
                    <th>' . number_format($row->discount, 2) . '</th>
                  </tr>';
            }
            $output .= '<div class="row">
        <div class="col-md-8">
        </div>
        <div class="col-md-4">    
            <div class="table-responsive" style="width:40%;margin-left:55%!important;">
              <table class="table table-bordered">
                <tbody>
                <tr>
                  <th>Total Amount</th>
                  <th style="width: 40%;">' . number_format($row->total_amt, 2) . '</th>
                </tr>
                </tbody>
                <tbody>
                <tr>
                  <th>Paid Amount</th>
                  <th>' . number_format($row->amt_recieved, 2) . '</th>
                </tr>' . $discount . '
                <tr>
                  <th>Pending Amount</th>
                  <th>' . number_format($row->pending_amt, 2) . '</th>
                </tr>
              
                </tbody>
              </table>
            </div>        
        </div>
    </div>';
        }
        return $output;
    }
    
    public function getFooterDetails($caseId)
    {
        $sql = "SELECT COALESCE(cd.footer_logo,'resource/img/footer.png') as footer_logo
         FROM center_letter_head_details cd 
        LEFT JOIN case_master cm ON cm.centerId = cd.centerId WHERE cm.caseId = $caseId";
         $query = $this->db->query($sql);
          $footer_logo = 'resource/img/footer.png'; 
         foreach ($query->result() as $row) {
          $footer_logo =$row->footer_logo;
         }
        $output = '</div><footer>
        <br>
        <center><img src="'.$footer_logo.'" width="800px"></center>
        <br>
    </div>
    <div class="col-md-2">
   
    </div>
    <div class="col-md-3">
    </div>
  </div>
</section>
</div>
</footer>
<div class="control-sidebar-bg"></div>
</div>';
        return $output;
    }
    public function get_findings($caseId)
    {
        $output = '';
        
        $sql   = "SELECT cp.category FROM case_report_data cp WHERE cp.reportId =1 GROUP BY cp.category";
        $query = $this->db->query($sql);
        
        $sql_2   = "SELECT * FROM case_report_data cp WHERE cp.reportId =1";
        $query_1 = $this->db->query($sql_2);
        
        foreach ($query->result() as $row) {
            $output .= '<div class="col-12 table-responsive">
        <center><h4 style="background-color: #fff;margin-top: 2%;"><b>' . $row->category . '</b></h4></center>
        <table class="table with-border" style="background-color: #ffffffd4;">
            <thead>
                <tr>

                    <th style="width: 20%">Test</th>
                    <th style="width: 20%">Value</th>
                    <th style="width: 10%">Unit</th>
                    <th style="width: 10%">Reference</th>
                </tr>
            </thead>
            <tbody>';
            
            foreach ($query_1->result() as $row2) {
                if ($row->category == $row2->category) {
                    $output .= '<tr>
                   <td>' . $row2->testName . '</td>
                  <td>
                      <div class="form-inline">
                      <label class="text-bold" for="">' . $row2->parameter . '</label>&nbsp;
                     ' . $row2->finding_value . '
                      </div>
                  </td>
                  <td>' . $row2->unit . '</td>
                  <td>' . $row2->reference_value . '</td>
              </tr>';
                }
            }
            $output .= '</tbody> </table><hr/></div>';
            
        }
        return $output;
    }
    public function get_findings_check($caseId)
    {
        $output = '';
        
        $sql   = "SELECT  lc.category,cm.test_name,cm.short_name FROM case_tests ct 
      INNER JOIN center_test_master cm ON cm.testId = ct.testId 
      INNER JOIN lab_center_categories lc ON lc.categoryid = cm.categoryId 
      WHERE ct.caseId = $caseId
      GROUP BY lc.category,cm.test_name";
        $query = $this->db->query($sql);
        
        $sql_2   = "SELECT crd.case_report_id,crd.reportId,crd.parameterId,crd.parameter,crd.testId,crd.testName,
        crd.finding_value,crd.categoryid,crd.category,crd.unit,crd.reference_value,crd.label,crd.isgroup 
        FROM case_report_data crd INNER JOIN case_report_master crm ON crm.reportId = crd.reportId
        WHERE crm.caseId = $caseId";
        $query_1 = $this->db->query($sql_2);
        
        
        foreach ($query->result() as $row) {
            
            $output .= '<div style="border-bottom: 1px solid;margin-bottom: 2%;"><div style="border-bottom: 1px solid;">
<center><h4 style="background-color: #fff;margin-top: 2%; font-weight: 800;">' . $row->category . '</h4></center>
<center><h5 style="background-color: #fff; font-weight: 700;margin-top: -1%;">' . $row->test_name . '</h5></center></div>
<div>
<table class="table-responsive" style="border:none !important;">
<tr>
<th>Test</th>
<th>Value</th>
<th>Unit</th>
<th>Reference</th>
</tr>';
            $groupArr         = array();
            $parameters       = '';
            $parmwithoutGroup = '';
            $groupName;
            foreach ($query_1->result() as $row_1) {
                if ($row->test_name == $row_1->testName && (!in_array($row_1->label, $groupArr)) && $row_1->isgroup == 1) {
                    $tempParm   = '';
                    $groupArr[] = $row_1->label;
                    $groupName  = '<tr>
      <td>' . $row_1->label . '</td>
      <td></td>
      <td></td>
      <td></td>
        </tr>';
                    foreach ($query_1->result() as $row_2) {
                        if ($row_1->label == $row_2->label && $row_1->testName == $row_2->testName && $row_2->isgroup == 1) {
                            $tempParm .= '<tr>
                  <td style="margin-left: 15%!important;">' . $row_2->parameter . '</td>
                  <td>
      <div class="form-inline">
      '.$row_1->finding_value.'
     </div>
  </td>
                  <td>' . $row_2->unit . '</td>
                  <td>' . $row_2->reference_value . '</td>
                    </tr>';
                        } //if
                        
                    } //for l
                    $parameters .= $groupName . $tempParm;
                } //if
                else if ($row->test_name == $row_1->testName && $row_1->isgroup == 0) {
                    $parmwithoutGroup .= '<tr>
    <td>' . $row_1->parameter . '</td>
    <td><div class="form-inline">
    '.$row_1->finding_value.'
    </div></td>
     <td>' . $row_1->unit . '</td>
     <td>' . $row_1->reference_value . '</td>
       </tr>';
                } //else
            } //for j
            $output .= $parameters . $parmwithoutGroup;
            $output .= '</table></div></div></div>';
        }
        return $output;
    }
    
}