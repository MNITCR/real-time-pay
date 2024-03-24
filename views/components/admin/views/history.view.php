<?php
$stmt = $conn->prepare("SELECT user_id, balance_r_d, sender, receiver, amount, description, status FROM payment_tbl WHERE user_id  = ?");
$stmt->execute([$_SESSION["user_id"]]);

if ($stmt) {
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="grid grid-cols-1 gap-6 mb-6">
    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 rounded-md">
        <div class="flex justify-between mb-4 items-start ps-6 pt-6 pr-6">
            <div class="font-medium">History</div>
            <div class="dropdown">
                <button type="button" class="dropdown-toggle text-gray-400 hover:text-gray-600"><i class="ri-more-fill"></i></button>
                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                    <li>
                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Settings</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="overflow-x-auto ps-2 pr-2 pb-6">
            <table class="w-full min-w-[460px] ">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">receiver name</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 px-4 text-left rounded-tl-md rounded-bl-md">sender name</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left">amount</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left">description</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tr-md rounded-br-md">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($rows)) : ?>
                        <tr class="text-center">
                            <td class="border-b border-b-gray-50 text-center pt-2" colspan="5">
                                <span class="inline-block p-1 rounded bg-red-500/10 text-red-500 font-medium text-[12px] leading-none">Not Found</span>
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($rows as $row) : ?>
                            <?php
                            $check = ($row["balance_r_d"] == "balance_kh") ? "៛" : "$";
                            ?>

                            <tr>
                                <td class="px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                        <span class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate"><?= $row["receiver"] ?></span>
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-gray-600 text-sm font-medium hover:text-blue-500"><?= $row["sender"] ?></span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-emerald-500"><?= $row["amount"] . " " . $check ?></span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-[13px] font-medium text-emerald-500"><?= $row["description"] ?></span>
                                </td>
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium text-[12px] leading-none"><?= $row["status"] ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
