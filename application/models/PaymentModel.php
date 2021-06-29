<?php
class PaymentModel extends CI_Model
{

    public function payment_reg($data)
    {

        $this
            ->db
            ->insert('center_payment_details', $data);
        return $this
            ->db
            ->insert_id();
    }

    public function get_payments($id)
    {
        $data;
        if ($id != 0)
        {
            $data = $query = $this
                ->db
                ->get_where('center_payment_details', array(
                'centerId' => $id
            ))->row_array();
        }
        else
        {
            $data = $this
                ->db
                ->get('center_payment_details')
                ->result();
        }
        return $data;
    }
    public function check_center_is_active($centerId)
    {
        $result = array();
        $sql = "SELECT * FROM `center_payment_details` WHERE `enddate` >= CURDATE() 
        AND centerId = $centerId";
        $query = $this
            ->db
            ->query($sql);
        if ($query->num_rows() > 0)
        {
            $result['data'] = $query->result();
            $result['status'] = true;
        }
        else
        {
            $result['data'] = [];
            $result['status'] = false;
        }
        return $result;
    }

}

