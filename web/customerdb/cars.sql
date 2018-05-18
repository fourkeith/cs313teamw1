-- Create the Table to hold the Cars
CREATE TABLE Cars (
      CARID SERIAL PRIMARY KEY  NOT NULL
    , MAKE         VARCHAR(50)  NOT NULL
    , MODEL        VARCHAR(50)  NOT NULL
    , YEAR         INT          NOT NULL
    , VIN          INT          NOT NULL
    , LICENSEPLATE VARCHAR(50)  NOT NULL
    , ODOMETER     INT          NOT NULL
    , CUSTOMERID   INT          references Customer(customerid)
    , WORKID       INT          references Work(workid)
);

