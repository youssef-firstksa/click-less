<?php

namespace App\Enums;

enum PermissionEnum: string
{
    // PLATFORM ACCESS LEVEL

    case ACCESS_DASHBOARD = 'access-dashboard';
    case ACCESS_AGENT = 'access-agent';

    /**
     * ************************************
     * *** Dashboard Access Permissions ***
     * ************************************
     */

/**
     * Role Permissions
     */

    case LIST_ROLE = 'list-role';
    case SHOW_ROLE = 'show-role';
    case CREATE_ROLE = 'create-role';
    case UPDATE_ROLE = 'update-role';
    case DELETE_ROLE = 'delete-role';

/**
     * User Permissions
     */

    case LIST_USER = 'list-user';
    case SHOW_USER = 'show-user';
    case CREATE_USER = 'create-user';
    case UPDATE_USER = 'update-user';
    case DELETE_USER = 'delete-user';

/**
     * Bank Permissions
     */

    case LIST_BANK = 'list-bank';
    case SHOW_BANK = 'show-bank';
    case CREATE_BANK = 'create-bank';
    case UPDATE_BANK = 'update-bank';
    case DELETE_BANK = 'delete-bank';

/**
     * Product Permissions
     */

    case LIST_PRODUCT = 'list-product';
    case SHOW_PRODUCT = 'show-product';
    case CREATE_PRODUCT = 'create-product';
    case UPDATE_PRODUCT = 'update-product';
    case DELETE_PRODUCT = 'delete-product';

/**
     * Section Permissions
     */

    case LIST_SECTION = 'list-section';
    case SHOW_SECTION = 'show-section';
    case CREATE_SECTION = 'create-section';
    case UPDATE_SECTION = 'update-section';
    case DELETE_SECTION = 'delete-section';

/**
     * Article Permissions
     */

    case LIST_ARTICLE = 'list-article';
    case SHOW_ARTICLE = 'show-article';
    case CREATE_ARTICLE = 'create-article';
    case UPDATE_ARTICLE = 'update-article';
    case DELETE_ARTICLE = 'delete-article';

/**
     * Article Permissions
     */

    case LIST_NOTIFICATION = 'list-notification';
    case SHOW_NOTIFICATION = 'show-notification';
    case CREATE_NOTIFICATION = 'create-notification';
    case UPDATE_NOTIFICATION = 'update-notification';
    case DELETE_NOTIFICATION = 'delete-notification';

    /**
     * ********************************
     * *** Agent Access Permissions ***
     * ********************************
     */

    //  case AGENT_LIST_ARTICLE = 'agent-list-article';
    //  case AGENT_SHOW_ARTICLE = 'agent-show-article';

    //  case AGENT_ADD_NOTE = 'agent-add-note';

    // ===== Grouped Getters =====

    public static function accessPermissions(): array
    {
        return [
            self::ACCESS_AGENT,
            self::ACCESS_DASHBOARD,
        ];
    }

    public static function rolePermissions(): array
    {
        return [
            self::LIST_ROLE,
            self::SHOW_ROLE,
            self::CREATE_ROLE,
            self::UPDATE_ROLE,
            self::DELETE_ROLE,
        ];
    }

    public static function userPermissions(): array
    {
        return [
            self::LIST_USER,
            self::SHOW_USER,
            self::CREATE_USER,
            self::UPDATE_USER,
            self::DELETE_USER,
        ];
    }

    public static function bankPermissions(): array
    {
        return [
            self::LIST_BANK,
            self::SHOW_BANK,
            self::CREATE_BANK,
            self::UPDATE_BANK,
            self::DELETE_BANK,
        ];
    }

    public static function productPermissions(): array
    {
        return [
            self::LIST_PRODUCT,
            self::SHOW_PRODUCT,
            self::CREATE_PRODUCT,
            self::UPDATE_PRODUCT,
            self::DELETE_PRODUCT,
        ];
    }

    public static function sectionPermissions(): array
    {
        return [
            self::LIST_SECTION,
            self::SHOW_SECTION,
            self::CREATE_SECTION,
            self::UPDATE_SECTION,
            self::DELETE_SECTION,
        ];
    }

    public static function articlePermissions(): array
    {
        return [
            self::LIST_ARTICLE,
            self::SHOW_ARTICLE,
            self::CREATE_ARTICLE,
            self::UPDATE_ARTICLE,
            self::DELETE_ARTICLE,
        ];
    }

    public static function notificationPermissions(): array
    {
        return [
            self::LIST_NOTIFICATION,
            self::SHOW_NOTIFICATION,
            self::CREATE_NOTIFICATION,
            self::UPDATE_NOTIFICATION,
            self::DELETE_NOTIFICATION,
        ];
    }

    public static function allPermissions(): array
    {
        return self::cases();
    }
}
