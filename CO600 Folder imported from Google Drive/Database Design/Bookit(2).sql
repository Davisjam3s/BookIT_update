CREATE TABLE Agreement (
  AgreementUID int AUTO_INCREMENT,
  AgreementDescription VARCHAR(100),
  Supervised Boolean,
  PRIMARY KEY (AgreementUID)
);

CREATE TABLE GroupA (
  GroupUID int AUTO_INCREMENT,
  GroupDescription VARCHAR (100),
  PRIMARY KEY (GroupUID)
);

CREATE TABLE Owner (
  OwnerUID int AUTO_INCREMENT,
  GroupUID int,
  OwnerLocation VARCHAR (100),
  OwnerEmail VARCHAR(50),
  PRIMARY KEY (OwnerUID),
  FOREIGN KEY (GroupUID) REFERENCES GroupA(GroupUID)
);

CREATE TABLE Asset (
  AssetUID int AUTO_INCREMENT,
  AgreementUID int,
  OwnerUID int,
  AssetDescription VARCHAR(100),
  AssetCondition VARCHAR(100),
  AssetImage VARCHAR(100),
  PRIMARY KEY(AssetUID),
  FOREIGN KEY(AgreementUID) REFERENCES Agreement(AgreementUID),
  FOREIGN KEY(OwnerUID) REFERENCES Owner(OwnerUID)
);

CREATE TABLE UserType (
  UserTypeUID int AUTO_INCREMENT,
  UserTypeDescription VARCHAR(100),
  PRIMARY KEY (UserTypeUID)
);

CREATE TABLE User (
  UserUID VARCHAR(7),
  UserTypeUID int,
  UserBanned BOOLEAN,
  UserYear int,
  UserEmail VARCHAR(50),
  UserFname VARCHAR(50),
  UserCampus VARCHAR(12),
  PRIMARY KEY (UserUID),
  FOREIGN KEY (UserTypeUID) REFERENCES UserType(UserTypeUID)
);


CREATE TABLE Loan (
  LoanUID int AUTO_INCREMENT,
  UserUID VARCHAR(7),
  LoanDate Date,
  PRIMARY KEY (LoanUID),
  FOREIGN KEY (UserUID) REFERENCES User(UserUID)
);

CREATE TABLE LoanContent (
  LoanContentUID int AUTO_INCREMENT,
  LoanUID int,
  AssetUID int,
  setReturn Boolean,
  ReturnDate Date,
  PRIMARY KEY (LoanContentUID),
  FOREIGN KEY (LoanUID) REFERENCES Loan(LoanUID),
  FOREIGN KEY (AssetUID) REFERENCES Asset(AssetUID)
);










