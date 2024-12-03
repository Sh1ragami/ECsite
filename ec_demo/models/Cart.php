<?php
class Cart
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // ユーザーに紐づいたカートの内容を取得
    public function getCartByUserID($user_ID)
    {
        $stmt = $this->db->prepare("SELECT * FROM cart WHERE user_ID=?");
        $stmt->execute([$user_ID]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addToCart($user_ID, $cm_ID, $quantity)
    {
        // 商品が既にカートにあるかチェック
        $stmt = $this->db->prepare("SELECT quantity FROM cart WHERE user_ID = ? AND cm_ID = ?");
        $stmt->execute([$user_ID, $cm_ID]);
        $existingItem = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingItem) {
            // 既存の商品がカートにある場合は数量を更新
            $newQuantity = $existingItem['quantity'] + $quantity;
            $stmt = $this->db->prepare("UPDATE cart SET quantity = ? WHERE user_ID = ? AND cm_ID = ?");
            $stmt->execute([$newQuantity, $user_ID, $cm_ID]);
        } else {
            // カートに商品がない場合は新規追加
            $stmt = $this->db->prepare("INSERT INTO cart  VALUES (?, ?, ?)");
            $stmt->execute([(int)$user_ID, (int)$cm_ID, (int)$quantity]);
        }
    }

    public function updateToCart($user_ID, $cm_ID, $quantity)
    {
        $stmt = $this->db->prepare("UPDATE cart SET quantity=? WHERE user_ID=? AND cm_ID=?");
        $stmt->execute([$quantity, $user_ID, $cm_ID]);
    }

    public function deleteAllToCart($user_ID)
    {
        $stmt = $this->db->prepare("DELETE FROM cart WHERE user_ID=?");
        $stmt->execute([$user_ID]);
    }
}
