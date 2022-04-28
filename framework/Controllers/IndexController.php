<?php

namespace Otus\Mvc\Controllers;

use Otus\Mvc\Core\Database;
use Otus\Mvc\Core\View;
use Otus\Mvc\Models\Eloquent\User as EloquentUser;
use Otus\Mvc\Models\OtusORM\Users as OtusORMUsers;
use Otus\Mvc\Models\Doctrine\User as DoctrineUser;
use PDO;
class IndexController
{
    public function index() {
        /*
        // Прежде всего нам надо получить объект EntityManager и работать с ним, лучше бы его также сделать в виде Singletone, чтобы вызов bootDoctrine() не возвращал каждый раз новый объект entityManager
        $manager = Database::bootDoctrine();
        // Пример работы c Doctrine
        // 1. Создание пользователя
        // Сначала создадим экземпляр класса (который мапится с таблицей)
        $user = new DoctrineUser("test1","test1@mail.ru","test test test");
        // Говорим EntityManager`у что данный объект должен быть отслеживаем
        $manager->persist($user);
        // Применим изменения в БД, после чего пользователь будет сохранен
        $manager->flush();

        // 2. Изменение пользователя
        // Получим нашего пользователя
        $persistentUser = $manager->getRepository('Otus\Mvc\Models\Doctrine\User')->find(1);
        // Поменяем что-то
        $persistentUser->setInfo("Persist this changes!");
        // Говорим EntityManager`у что данный объект должен быть отслеживаем
        $manager->persist($persistentUser);
        // Применим изменения в БД, после чего новое info будет дсотупно в БД
        $manager->flush();

        // 3. Удаление пользователя
        // Получим нашего пользователя
        $detachedUser = $manager->getRepository('Otus\Mvc\Models\Doctrine\User')->find(7);
        // Удаляем его
        $manager->remove($detachedUser);
        // Применим изменения в БД
        $manager->flush();

        // Вывести всех пользователей
        foreach(Database::bootDoctrine()->getRepository('Otus\Mvc\Models\Doctrine\User')->findAll() as $u)
        {
            echo $u->getName()."-".$u->getInfo()."<br>";
        }*/

        View::render('info',[
            'title' => 'Index page',
            'name' => 'Anonymous user'
        ]);
    }
}
