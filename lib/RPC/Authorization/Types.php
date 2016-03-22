<?php
namespace RPC\Authorization;

/**
 * Autogenerated by Thrift Compiler (0.9.2)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


final class GrantType {
  /**
   * 开发者，DEV_XIAOMI或DEV_XIAOMI_SSO登录用户
   */
  const DEVELOPER = 1;
  /**
   * APP_SECRET登录用户
   */
  const APP_ROOT = 2;
  /**
   * Oauth或xiaomi sso， APP_ACCESS_TOKEN和APP_XIAOMI_SSO登录用户
   */
  const APP_USER = 3;
  /**
   * 匿名，APP_ANONYMOUS， 登录用户
   */
  const GUEST = 4;
  static public $__names = array(
    1 => 'DEVELOPER',
    2 => 'APP_ROOT',
    3 => 'APP_USER',
    4 => 'GUEST',
  );
}

class Grantee {
  static $_TSPEC;

  /**
   * 被授权者类型
   * 
   * @var int
   */
  public $type = null;
  /**
   * 被授权者唯一标识，若 GrantType 为 DEV 即 developerId， 其它则为appId
   * 
   * @var string
   */
  public $identifier = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'type',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'identifier',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['type'])) {
        $this->type = $vals['type'];
      }
      if (isset($vals['identifier'])) {
        $this->identifier = $vals['identifier'];
      }
    }
  }

  public function getName() {
    return 'Grantee';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->type);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->identifier);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Grantee');
    if ($this->type !== null) {
      $xfer += $output->writeFieldBegin('type', TType::I32, 1);
      $xfer += $output->writeI32($this->type);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->identifier !== null) {
      $xfer += $output->writeFieldBegin('identifier', TType::STRING, 2);
      $xfer += $output->writeString($this->identifier);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

