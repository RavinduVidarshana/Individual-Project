<?php


namespace App\ExtraData;


class DefaultData
{
    public static $DEFAULT_APP_KEY = 'DYDLGWzDaPJGrOvE0MJJQmzro4HR1IDEeQd6SM1a';
    public static $USER_ROLE_ADMIN=1;
    public static $USER_ROLE_TEMPLE_MAIN_MONK=2;
    public static  $USER_ROLE_WELFARE_SOCIETY_PRESIDENT=3;
    public static  $USER_ROLE_DHAMMA_SCHOOL_PRINCIPLE=4;
    public static  $USER_ROLE_BUDDHIST_FOLLOWERS=5;

    public static $EVENT_ORGANIZATION_TEMPLE=1;
    public static $EVENT_ORGANIZATION_WELFARE_SOCIETY=2;
    public static $EVENT_ORGANIZATION_DHAMMA_SCHOOL=3;

    public static $NO_SESSION_URLS = array(
        'api/login',
        'api/templeregister',
        'api/bfregister'
    );
}
