<?php

/**
 * BaseProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $sf_guard_user_id
 * @property string $api_token
 * @property string $api_secret
 * @property sfGuardUser $sfGuardUser
 * 
 * @method integer     getSfGuardUserId()    Returns the current record's "sf_guard_user_id" value
 * @method string      getApiToken()         Returns the current record's "api_token" value
 * @method string      getApiSecret()        Returns the current record's "api_secret" value
 * @method sfGuardUser getSfGuardUser()      Returns the current record's "sfGuardUser" value
 * @method Profile     setSfGuardUserId()    Sets the current record's "sf_guard_user_id" value
 * @method Profile     setApiToken()         Sets the current record's "api_token" value
 * @method Profile     setApiSecret()        Sets the current record's "api_secret" value
 * @method Profile     setSfGuardUser()      Sets the current record's "sfGuardUser" value
 * 
 * @package    SystemCore
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profile');
        $this->hasColumn('sf_guard_user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('api_token', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('api_secret', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'sf_guard_user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}