<?php

namespace Http\controllers\articles;

use Core\App;
use Core\Authenticator;
use Core\Database;

class Article
{
    protected $db;
    protected $user;

    public function __construct()
    {
        $this->user = (new Authenticator())->isAuthenticated();
        $this->db = App::resolve(Database::class);
    }

    public function index()
    {
        return $this->db->query("SELECT id, title, content, created_at FROM `articles` WHERE deleted_at IS NULL AND user_id={$this->user['id']}")->get();
    }

    public function store($data)
    {
        $this->db->query('INSERT INTO `articles` (user_id, title, content) VALUES(:user_id, :title, :content)', [
            'user_id' => $this->user['id'],
            'title' => $data['title'],
            'content' => $data['content'],
        ]);
    }

    public function show($id)
    {
        return $this->db->query("SELECT id, title, content, created_at FROM `articles` WHERE deleted_at IS NULL AND id=:id AND user_id={$this->user['id']}", ['id' => $id])->findOrFail();
    }

    public function update($id, $data)
    {
        $this->show($id);
        $this->db->query('UPDATE `articles` SET title=:title, content=:content WHERE id=:id', [
            'title' => $data['title'],
            'content' => $data['content'],
            'id' => $id
        ]);
    }

    public function destroy($id)
    {
        $row = $this->show($id);
        return $this->db->query('UPDATE `articles` SET updated_at=CURRENT_TIMESTAMP, deleted_at=CURRENT_TIMESTAMP WHERE id=:id', ['id' => $row['id']]);
    }
}