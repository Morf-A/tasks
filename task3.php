<?php

class User() {

   /**
   * @var integer Уникальный id пользователя
   * @var string Имя пользователя
   */

	private $id;
	private $name;

	/**
	 * @param string $name Имя пользователя
	 * @return object User;
	 *
	 * Конструктор нового пользователя.
	 * В процессе работы конструтора происходит создание нового пользователя
	 * и сохранение его данных в БД. При сохранение мы получаем новый id, который сохраняем в поле $this->id
	 *
	 * Вообще, было бы правильнее создавать пользователя с помощью фабричного метода по тем же причинам, по которым это делается в классе Article,
	 * но так как в данной задаче не подразумевается получение уже сужествующих в базе пользователей, решил этого не делать.
	 */
	public function __construct($name){
	}

	/**
	 * @return integer Id пользователя;
	 *
	 * Метод позволяет получить id пользователя.
	 * Используется в классе Article при сохранении новой статьи и получении существующих.
	 */
	public function getId(){
	}

	/**
	 * @return string Имя пользователя;
	 *
	 * Метод позволяет получить имя пользователя.
	 */
	public function getName(){
	}
}

class Article() {

   /**
    * @var string Содержимое статьи
   	* @var integer Уникальный id статьи
   	* @var string Заголовок статьи
   	* @var Object Объект пользователя-автора
   	*
   	* Возможно, более правильно было бы хранить в статье не объект её автора а только его id (у объекта были бы те же поля что и в базе),
   	* но исходя из простоты задачи я решил этого не делать.
   */

	private $content;
	private $id;
	private $title;
	private $user;

	/**
	 * @param integer $id     Id статьи
	 * @param string $title   Заголовок статьи
	 * @param string $content Содержимое статьи статьи
	 * @param object $user    Автор статьи
	 * @return object Article;
	 *
	 * Конструктор приватный и вызывается только из фабричного метода
	 * так как мы не можем допустить создание экземпляра класса Article,
	 * который не сохранён в базу, а реализовать сохранение прямо в конструкторе мы не можем,
	 * так как может потребоваться создать объект, который уже есть в базе. (Как в методе getAllArticles).
	 */
	private function __construct($id, $title, $content, $user){
	}

	/**
	 * @param string $title   Заголовок статьи
	 * @param string $content Содержимое статьи статьи
	 * @param object $user    Автор статьи
	 * @return object Article;
	 *
	 * Фабричный метод создания новой статьи, который перед созданием объекта сохраняет его в базу.
	 * Таким образом мы получаем новый id и можем воспользоваться конструктором.
	 * В метод должен быть передан объект автора статьи для создания связи с ним.
	 */
	public static function createArticle($title, $content, $user){
	}


	/**
	 * @return array of object Article;
	 *
     * Метод возвращает массив статей, принадлежавщих пользователю $user,
     * получая данные о них из базы и создавая для каждой новый объект
     * с помощью конструктора.
	 */
	public static function getAllArticles($user){
	}


	/**
	 * @return object User;
	 *
     * Метод возвращает ссылку на объект пользователя, которая храниться в поле класса 	$this->user
	 * @return object User;
	 *
	 */
	public function getUser(){
	}


	/**
	 * @param object User;
	 * @return object User;
     * Метод замеяет значение поля $this->user на новое переданное. Возвращает ссылку на объект старого автора статьи.
	 */
	public function changeUser($newUser){
	}
}


/////////////////////////////////////////////////////////
//////////////////Примеры использования//////////////////


// Создали нового пользователя
$userName = 'Алёша';
$my_user = new User($userName);

// Добавили ему статью
$title   = 'Заголовок статьи';
$content = 'Содержимое статьи';
$my_article = Article::createArticle($title, $content, $my_user);

// Получить автора статьи
$my_userName = $my_article->getUser()->getName();

// Получить все статьи конкретного автора
$articlesArray = Article::getAllArticles($my_user);

// Сменить автора статьи
$my_newUser = new User('Паша');
$my_article->changeUser($my_newUser);