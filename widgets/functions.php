<?php

function getTabLinkByCategoryId($categoryId)
{
    $title = get_the_title($categoryId);

    switch ($title) {
        case 'Cryptocurrency':
            return '/blog/#category-1';
            break;
        case 'Data Privacy':
            return '/blog/#category-2';
            break;
        case 'Earn Money Online':
            return '/blog/#category-3';
            break;
        case 'In The Press':
            return '/blog/#category-4';
            break;
        case 'On The Air':
            return '/blog/#category-5';
            break;
        case 'Permission Marketing':
            return '/blog/#category-6';
            break;
        case 'Updates':
            return '/blog/#category-7';
            break;
        default:
            return '/blog/#category-1';
            break;
    }
}

function getTabLinkById()
{
    $pageCategories = get_pages([
        'parent' => 5690,
        'exclude' => [5922, 5928, 5931],
    ]);

    $categoriesTabs = [];

    foreach ($pageCategories as $key => $pageCategory) {
        $value = $key+1;
        $categoriesTabs[] = '#category-'.$value;
    }

    foreach ($categoriesTabs as $categoriesTab) {
        switch ($categoriesTab) {
            case '#category-0':
                return '/blog/#category-0';
                break;
            case '#category-1':
                return '/blog/#category-1';
                break;
            case '#category-2':
                return '/blog/#category-2';
                break;
            case '#category-3':
                return '/blog/#category-3';
                break;
            case '#category-4':
                return '/blog/#category-4';
                break;
            case '#category-5':
                return '/blog/#category-5';
                break;
            case '#category-6':
                return '/blog/#category-6';
                break;
            case '#category-7':
                return '/blog/#category-7';
                break;
            default:
                return '/blog';
                break;
        }
    }

    return null;
}