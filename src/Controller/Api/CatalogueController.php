<?php

namespace App\Controller\Api;

use App\Entity\Category;
use App\Entity\Community;
use App\Service\CategoryDataProvider;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CatalogueController
 *
 * @Route("/catalogue")
 */
class CatalogueController extends AbstractController
{
    /**
     * @param EntityManagerInterface $em
     * @param CategoryDataProvider   $categoryDataProvider
     *
     * @Route("/", name="catalogue_index")
     *
     * @return JsonResponse
     */
    public function getAction(EntityManagerInterface $em, CategoryDataProvider $categoryDataProvider): JsonResponse
    {
        $t = json_decode("{
        \"groups\": [{
    \"name\": \"\",
    \"key\": \"vkontakte\",
    \"items\": [{
      \"group\": {
        \"thumb\": \"require('./img/vk/spok.jpg')\",
        \"name\": \"Спокойной ночи, бульбаши!<br>Беларусь. Минск\",
        \"type\": \"vkontakte\",
        \"url\": \"https://vk.com/goodnightbelarusians\"
      },
      \"description\": \"Эпицентр Белорусского Юмора<br>16-23 года (м71% ж29%)\",
      \"subscribe\": 63300,
      \"price\": 10
    },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/belarus_now.jpg')\",
          \"name\": \"Беларусь Сейчас\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/of.belarusian\"
        },
        \"description\": \"Новости Беларуси с огоньком<br>16-23 года (м52% ж%48)\",
        \"subscribe\": 334600,
        \"price\": 35
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/etobelarus.jpg')\",
          \"name\": \"Это Беларусь\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/my_belarusian\"
        },
        \"description\": \"Самые свежие и интересные юмористические<br>новости<br>16-23 года (м50% ж50%)\",
        \"subscribe\": 120900,
        \"price\": 25
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/chsminsk.jpg')\",
          \"name\": \"ЧС Минск\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/blacklistminska\"
        },
        \"description\": \"Сообщество, где обсуждаются проблемы<br>города Минска<br>16-23 года (м48% ж52%)\",
        \"subscribe\": 69390,
        \"price\": 20
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/minsk_now.jpg')\",
          \"name\": \"Минск Сейчас\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/inter.minsk\"
        },
        \"description\": \"Уникальный проект о городе Минске<br>16-23 года (м23% ж77%)\",
        \"subscribe\": 285100,
        \"price\": 35
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/autominsk.jpg')\",
          \"name\": \"Авто Минск\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/autobelar\"
        },
        \"description\": \"Автовладельцы и просто автолюбители<br>Минска<br>16-23 года (м86% ж14%)\",
        \"subscribe\": 40300,
        \"price\": 15
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/autobelarus.jpg')\",
          \"name\": \"Авто Беларусь\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/autobelarusian\"
        },
        \"description\": \"Любители автомобилей по всей Беларуси<br>16-23 года (м78% ж22%)\",
        \"subscribe\": 20700,
        \"price\": 10
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/haliavaminsk.jpg')\",
          \"name\": \"Халява Минск\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/barahlominska\"
        },
        \"description\": \"Скидки, акции, отдам даром,<br>афиша 16-23 года (м43% ж57%)\",
        \"subscribe\": 18900,
        \"price\": 10
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/incidentminsk.jpg')\",
          \"name\": \"Инцидент Минск\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/chp_minska\"
        },
        \"description\": \"Эпицентр происшествий<br>16-23 года (м57% ж43%)\",
        \"subscribe\": 262000,
        \"price\": 35
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/mogilevnow.jpg')\",
          \"name\": \"Могилев Сейчас\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/inter.mogilev\"
        },
        \"description\": \"Уникальный проект о городе Могилёве<br>16-23 года (м23% ж77%)\",
        \"subscribe\": 96300,
        \"price\": 20
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/spokbrest.jpg')\",
          \"name\": \"Спокойной ночи, Брест!\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/gnbrest\"
        },
        \"description\": \"Эпицентр Белорусского Юмора для жителей<br>Бреста<br>16-23 года (м81% ж19%)\",
        \"subscribe\": 11800,
        \"price\": 5
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/tipbelarus.jpg')\",
          \"name\": \"Типичная Беларусь\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/belarustravelby\"
        },
        \"description\": \"Публичная страница о Беларуси<br>16-23 года (м60% ж40%)\",
      \"subscribe\": 30200,
      \"price\": 5
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/nationalgeographsbelarus.jpg')\",
          \"name\": \"National Geographic Belarus\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/ngbelarus\"
        },
        \"description\": \"Природа Беларуси<br>16-23 года (м55% ж45%)\",
        \"subscribe\": 31200,
        \"price\": 5
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/minskmodnk.jpg')\",
          \"name\": \"Минский модник\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/modnyminsk\"
        },
        \"description\": \"Фото стильных людей<br>16-23 года (м63% ж37%)\",
        \"subscribe\": 45000,
        \"price\": 5
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/afishaminsk.jpg')\",
          \"name\": \"Афиша Минска \",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/in.minsk\"
        },
        \"description\": \"Афиша интересных событий в Минске<br>16-23 года (м51% ж49%)\",
        \"subscribe\": 28500,
        \"price\": 5
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/drugoiminsk.jpg')\",
          \"name\": \"Другой Минск\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/drugoyminsk\"
        },
        \"description\": \"Многочисленное сообщество о Минске<br>16-23 года (м56% ж44%)\",
        \"subscribe\": 133800,
        \"price\": 25
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/minskonelove.jpg')\",
          \"name\": \"Минск One Love\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/minskonelove\"
        },
        \"description\": \"Интересные факты о Минске<br>16-23 года (м62% ж38%)\",
        \"subscribe\": 24400,
        \"price\": 5
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/minskkotorogonet.jpg')\",
          \"name\": \"Минск, которого нет\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/neminsk\"
        },
        \"description\": \"Проект для творческих жителей города<br>Минска<br>16-23 года (м57% ж43%)\",
        \"subscribe\": 24500,
        \"price\": 5
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/kudapoitiminsk.jpg')\",
          \"name\": \"Куда пойти? Минск\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/kto.kuda\"
        },
        \"description\": \"Концерты и мероприятия Минска<br>16-23 года (м46% ж54%)\",
        \"subscribe\": 110500,
        \"price\": 25
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/rabotaminsk.jpg')\",
          \"name\": \"Работа в Минске\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/minskrabota\"
        },
        \"description\": \"Официальные предложения работы<br>и проверенные рекламодатели<br>18-35 года (м61% ж39%)\",
        \"subscribe\": 77300,
        \"price\": 20
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/nahodimgomel.jpg')\",
          \"name\": \"Находим Гомель\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/nahodim.gomel\"
        },
        \"description\": \"Поиск потерянных вещей в Гомеле<br>16-23 года (м60% ж40%)\",
        \"subscribe\": 51900,
        \"price\": 10
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/nahodimdevushekgomel.jpg')\",
          \"name\": \"Находим девушек Гомель\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/nahodim.gomel.girls\"
        },
        \"description\": \"Сообщество по поиску девушек в Гомеле<br>18-35 года (м44% ж56%)\",
        \"subscribe\": 33400,
        \"price\": 5
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/nahodimparneygolem.jpg')\",
          \"name\": \"Находим парней Гомель\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/nahodim.gomel.boys\"
        },
        \"description\": \"Сообщество по поиску парней в Гомеле<br>18-35 года (м74% ж26%)\",
        \"subscribe\": 28000,
        \"price\": 5
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/tipichniiminsk.jpg')\",
          \"name\": \"ТИПИЧНЫЙ МИНСК\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/tipichnyminsk\"
        },
        \"description\": \"Сообщество с новостями Минска<br>16-23 года (м56% ж44%)\",
      \"subscribe\": 127900,
      \"price\": 25
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/litbel.jpg')\",
          \"name\": \"Lit.bel.\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/litbel\"
        },
        \"description\": \"Прытулак для душы<br>16-23 года (м37% ж63%)\",
        \"subscribe\": 147500,
        \"price\": 25
      },
      {
        \"group\": {
          \"thumb\": \"require('./img/vk/bulbash.jpg')\",
          \"name\": \"Бульбаш\",
          \"type\": \"vkontakte\",
          \"url\": \"https://vk.com/bulbawi\"
        },
        \"description\": \"Белорусский паблик с мемами<br>16-23 года (м53% ж47%)\",
        \"subscribe\": 20900,
        \"price\": 5
      }
    ]
  },
    {
      \"name\": \"Телеграм\",
      \"key\": \"telegram\",
      \"items\": [{
        \"group\": {
          \"thumb\": \"require('./img/telegram/belarusnow.jpg')\",
          \"name\": \"Беларусь Сейчас\",
          \"type\": \"telegram\",
          \"url\": \"https://t.me/joinchat/AAAAAD_lupP37vKKkqdxkA\"
        },
        \"description\": \"Интересные новости Беларуси<br>16-23 года\",
        \"subscribe\": 126400,
        \"price\": 650
      },
        {
          \"group\": {
            \"thumb\": \"require('./img/telegram/incidentminsk.jpg')\",
            \"name\": \"Минск Сейчас\",
            \"type\": \"telegram\",
            \"url\": \"https://t.me/joinchat/AAAAAEnndJ7KUc0u03LBug\"
          },
          \"description\": \"Новости Минска<br>18-35 года\",
          \"subscribe\": 20400,
          \"price\": 120
        },
        {
          \"group\": {
            \"thumb\": \"require('./img/telegram/minsknow.jpg')\",
            \"name\": \"Инцидент Минск\",
            \"type\": \"telegram\",
            \"url\": \"https://t.me/joinchat/AAAAAFNWAV2OGL7nV1dzYg\"
          },
          \"description\": \"Эпицентр происшествий<br>16-23 года\",
          \"subscribe\": 11400,
          \"price\": 60
        }
      ]
    },
    {
      \"name\": \"Инстаграм\",
      \"key\": \"instagram\",
      \"items\": [{
        \"group\": {
          \"thumb\": \"require('./img/instagram/minsknow.jpg')\",
          \"name\": \"Минск Сейчас\",
          \"type\": \"instagram\",
          \"url\": \"https://www.instagram.com/inter.minsk/\"
        },
        \"description\": \"Новости Минска<br>16-23 года\",
        \"subscribe\": 142000,
        \"price\": 100
      },
        {
          \"group\": {
            \"thumb\": \"require('./img/instagram/incidentminsk.jpg')\",
            \"name\": \"Инцидент Минск\",
            \"type\": \"instagram\",
            \"url\": \"https://www.instagram.com/chp_minska/\"
          },
          \"description\": \"Эпицентр происшествий<br>18-35 года\",
          \"subscribe\": 109000,
          \"price\": 70
        },
        {
          \"group\": {
            \"thumb\": \"require('./img/instagram/belarusnow.jpg')\",
            \"name\": \"Беларусь | Сейчас \",
            \"type\": \"instagram\",
            \"url\": \"https://www.instagram.com/of.belarusian/\"
          },
          \"description\": \"Интересные новости Беларуси<br>16-23 года\",
          \"subscribe\": 107000,
          \"price\": 70
        },
        {
          \"group\": {
            \"thumb\": \"require('./img/instagram/chsminsk.jpg')\",
            \"name\": \"ЧС Минск\",
            \"type\": \"instagram\",
            \"url\": \"https://www.instagram.com/blacklistminska/\"
          },
          \"description\": \"Обсуждение проблем города Минска<br>18-35 года\",
          \"subscribe\": 24300,
          \"price\": 35
        }
      ]
    }
  ]
}");

        foreach ($t->groups as $categoryStr) {
            $category = new Category();
            $category
                ->setName($categoryStr->name)
                ->setCategoryKey($categoryStr->key);

            foreach ($categoryStr->items as $items) {
                $comm = new Community();
                $comm
                    ->setDescription($items->description)
                    ->setSubscribers($items->subscribe)
                    ->setCost($items->price)
                    ->setName($items->group->name)
                    ->setImage($items->group->thumb)
                    ->setUrl($items->group->url)
                    ->setActive(1)
                    ->setCategory($category);

                $em->persist($comm);
            }

            $em->persist($category);
        }

        $em->flush();

        $categories = $em->getRepository(Category::class)->findAll();

        $result = $categoryDataProvider->provideModels($categories);

        return new JsonResponse(['groups' => $result]);
    }
}
