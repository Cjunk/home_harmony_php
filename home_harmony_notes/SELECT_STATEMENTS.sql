-- see total count of SOH broken down by item TYPES
SELECT im.item_type, COUNT(*) AS total_count
FROM SOH soh
JOIN ITEM_MASTER im ON soh.item_number = im.item_number 
WHERE soh.userID = 2 --TODO: replace user 2 with ?
GROUP BY im.item_type;


-- Get the total SOH count for the user
SELECT userID, COUNT(*) AS total_count 
FROM SOH
WHERE userID = 2   --TODO: change the userID
GROUP BY userID;


--UNUSED STOCK. Show items in SOH not used for X amount of days
SELECT *
FROM SOH
WHERE DATEDIFF(CURDATE(), soh_last_updated) > 500; -- Replace 500 with your desired number of days