<?php
$ref = $_GET['reference'];
if ($ref = "") {
    header("location:javascript://history.go(-1)");
}
$curl = curl_init();

curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_live_ceca867f2367004b55516139c1d6120743967592",
            "Cache-Control: no-cache",
        ),
    )
);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    //echo $response;
    $result = json_decode($response);
}
if ($result->data->status == 'success') {
    $status = $result->data->status;
    $reference = $result->data->reference;
    $lname = $result->data->customer->last_name;
    $fname = $result->data->customer->first_name;
    $fullname = $fname . '' . $lname;
    $cus_email = $result->data->customer->email;
    date_default_timezone_set('Africa/Accra');
    include('connection.php');
    $stmt = $con->prepare("INSERT INTO customer_details (status,reference,fullname,email) VALUES(?,?,?,?)");
    $stmt->bind_param("ssss", $status, $reference, $fullname, $cus_email);
    $stmt->execute();
    if (!$stmt) {
        echo 'There was an error' . mysqli_error($con);
    } else {
        header("loation:premium.php?status=success");
        exit;
    }
    $stmt->close();
    $con->close();
} else {
    header("location:error.html");
}
?>