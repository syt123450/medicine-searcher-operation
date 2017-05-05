// use 226operation;
db.saleTransaction.insertMany (
    [
        {
            "transactionId": 1,
            "quantity": 3,
            "totalPrice" : 1023.88,
            "time": "05/05/2017",
            "factoryID" : 1,
            "brandID" : 2,
            "medicineId": 552,
            "storeId": 17,
            "customerId": 1730
        },
        {
            "transactionId": 2,
            "quantity": 7,
            "totalPrice" : 1023.88,
            "time": "05/05/2017",
            "factoryID" : 1,
            "brandID" : 2,
            "medicineId": 755,
            "storeId": 23,
            "customerId": 1834
        },
    ]
);
