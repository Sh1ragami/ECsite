<?php
class Commodity
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // すべての商品を取得
    public function getAllCommodities()
    {
        $stmt = $this->db->prepare("SELECT * FROM commodity");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 商品IDに対応する商品を取得
    public function getCommodityByID($cm_ID)
    {
        $stmt = $this->db->prepare("SELECT * FROM commodity WHERE cm_ID=?");
        $stmt->execute([$cm_ID]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 複数の商品IDに対応する商品を取得
    public function getCommoditiesByIDs($commodityIDs)
    {
        if (empty($commodityIDs)) {
            return [];
        }
        // 商品IDをカンマ区切りの文字列に変換
        $placeholders = implode(',', array_fill(0, count($commodityIDs), '?'));
        $sql = "SELECT * FROM commodity WHERE cm_ID IN ($placeholders)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($commodityIDs);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // カテゴリごとの商品を取得
    public function getCommodityByCategory($category)
    {
        $stmt = $this->db->prepare("SELECT * FROM commodity WHERE category=?");
        $stmt->execute([$category]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 検索クエリで商品を取得
    public function getCommodityByQuery($query)
    {
        $stmt = $this->db->prepare("SELECT * FROM commodity WHERE cm_name LIKE ?");
        $like = '%' . $query . '%';
        $stmt->execute([$like]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
