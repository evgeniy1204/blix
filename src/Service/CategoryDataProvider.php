<?php

namespace App\Service;

use App\Entity\Category;
use App\Entity\Community;
use App\Model\CategoryModel;
use App\Model\CommunityModel;
use App\Model\GroupModel;

/**
 * Class CategoryDataProvider
 */
class CategoryDataProvider
{
    /**
     * @param array $categories
     *
     * @return array
     */
    public function provideModels(array $categories): array
    {
        $result = [];

        /** @var $category Category */
        foreach ($categories as $category) {
            $items = [];

            /** @var $community Community */
            foreach ($category->getCommunities() as $community) {
                $groupModel = new GroupModel(
                    $community->getImage(),
                    $community->getName(),
                    $category->getCategoryKey(),
                    $community->getUrl()
                );

                $communityModel = new CommunityModel(
                    $groupModel,
                    $community->getDescription(),
                    $community->getSubscribers(),
                    $community->getCost()
                );

                $items[] = $communityModel;
            }

            $categoryModel = new CategoryModel(
                $category->getName(),
                $category->getCategoryKey(),
                $items
            );

            $result[] = $categoryModel;
        }

        return $result;
    }
}
