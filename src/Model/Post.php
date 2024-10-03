<?php

declare(strict_types=1);

class Post
{
    private const DSN = 'mysql:host=engineer-internship-training-mysql-1;dbname=mydatabase;';
    private const DB_USER = 'myuser';
    private const DB_PASS = 'mypassword';

    /**
     * DBに投稿データを保存する
     *
     * @param string $name 投稿者名
     * @param string $message 日報内容
     */
    public function save(string $name, string $message): void
    {
        $pdo = $this->dbConnect();
        $query = "INSERT INTO posts(`name`, `message`) VALUE('$name', '$message')";
        $pdo->query($query);
    }

    /**
     * 投稿データを更新する
     * 
     * @param int $id ID
     * @param string $name 投稿者名
     * @param string $message 日報内容
     */
    public function update(int $id, string $name, string $message): void
    {
        $pdo = $this->dbConnect();
        $query = "UPDATE `posts` SET `name` = '$name', `message` = '$message' WHERE `id` = $id;";
        $pdo->query($query);
    }

    /**
     * 投稿データを削除する
     *
     * @param int $id ID
     * @return bool
     */
    public function delete(int $id): bool
    {
        $pdo = $this->dbConnect();
        $query = "DELETE FROM `posts` WHERE `id` = $id";
        $statement = $pdo->query($query);
        return $statement->rowCount() === 1;
    }

    /**
     * 投稿データにいいねを追加する
     *
     * @param int $id ID
     * @param int $count 更新するいいね数
     * @return void
     */
    public function favorite(int $id, int $count) : void
    {
        $pdo = $this->dbConnect();
        $query = "UPDATE `posts` SET `favorite` = $count WHERE `id` = $id;";
        $pdo->query($query);
    }

    /**
     * DBにあるデータを取得する
     *
     * @return array{id: string, name: string, message: string, created_at: string} 取得したデータ
     */
    public function fetch(): array
    {
        $pdo = $this->dbConnect();
        $sql = "SELECT `id`, `name`, `message`, `created_at`, `favorite` 
            FROM posts 
            ORDER BY `id` DESC";
        $statement = $pdo->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * DBに接続したPDOを返却する
     *
     * @return PDO
     */
    private function dbConnect(): PDO
    {
        $pdo = new PDO(self::DSN, self::DB_USER, self::DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        return $pdo;
    }
}
