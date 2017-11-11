<?php

class sendMail
{
  private $toAddress;
  private $subject;
  private $body;
  private $from;
  private $headers;

  public function __construct($_toAddress = '', $_subject = '', $_body = '', $_from = '')
  {
    $this->toAddress = $_toAddress;
    $this->subject = $_subject;
    $this->body = $_body;
    $this->from = $_from;
    $this->headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $this->headers = "MIME-Version: 1.0\r\n";
    $this->headers .= "From: User <{$this->from}> \n";
  }


  public function send()
  {
    return $retval = mail($this->toAddress, $this->subject, $this->body, $this->headers);
  }
}