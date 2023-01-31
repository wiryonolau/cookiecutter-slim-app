<?php
use Itseasy\Database\Metadata\Object\MysqlTableObject;
use Laminas\Db\Metadata\Object\ColumnObject;
use Laminas\Db\Metadata\Object\ConstraintObject;
use Laminas\Db\Metadata\Object\TriggerObject;

return [
    "tables" => [
        function() {
            $table = new MysqlTableObject("user");
            $table->setEngine("InnoDB");
            $table->setCharset("utf8mb4");
            $table->setCollation("utf8mb4_unicode_ci");
            $table->setColumns([
                function() use ($table) {
                    $column = new ColumnObject("id", $table->getName());
                    $column->setDataType("int");
                    $column->setNumericUnsigned(true);
                    $column->setErrata("auto_increment", true);
                    $column->setIsNullable(false);
                    return $column;
                },
                function () use ($table) {
                    $column = new ColumnObject("username", $table->getName());  
                    $column->setDataType("varchar");
                    $column->setCharacterMaximumLength(255);
                    $column->setIsNullable(false);
                    return $column;
                },
                function () use ($table) {
                    $column = new ColumnObject("email", $table->getName());  
                    $column->setDataType("varchar");
                    $column->setCharacterMaximumLength(255);
                    $column->setIsNullable(false);
                    return $column;
                },
                function () use ($table) {
                    $column = new ColumnObject("password", $table->getName());  
                    $column->setDataType("varchar");
                    $column->setCharacterMaximumLength(255);
                    $column->setIsNullable(false);
                    return $column;
                },
                function() use ($table) {
                    $column = new ColumnObject("tech_creation_date", $table->getName());
                    $column->setDataType("datetime");
                    $column->setIsNullable(true);
                    return $column;
                },
                function() use ($table) {
                    $column = new ColumnObject("tech_modification_date", $table->getName());
                    $column->setDataType("datetime");
                    $column->setIsNullable(true);
                    return $column;
                }
            ]);
            $table->setConstraints([
                function()  use ($table) { 
                    $constraint = new ConstraintObject("PRIMARY", $table->getName());
                    $constraint->setType("PRIMARY KEY");
                    $constraint->setColumns($columns);
                    return $constraint;
                }
            ]);
            return $table;
        }
    ],
    "triggers" => [
        function() {
            $trigger = new TriggerObject();
            $trigger->setName("user_BINS");
            $trigger->setActionTiming("BEFORE");
            $trigger->setEventManipulation("INSERT");
            $trigger->setEventObjectTable("user");
            $trigger->setActionOrientation("ROW");
            $trigger->setActionStatement(
                "BEGIN
                SET NEW.tech_creation_date = UTC_TIMESTAMP(), NEW.tech_modification_date = UTC_TIMESTAMP(); 
                END"
            );
            return $trigger;
        },
        function() {
            $trigger = new TriggerObject();
            $trigger->setName("user_BUPD");
            $trigger->setActionTiming("BEFORE");
            $trigger->setEventManipulation("UPDATE");
            $trigger->setEventObjectTable("user");
            $trigger->setActionOrientation("ROW");
            $trigger->setActionStatement(
                "BEGIN
                SET NEW.tech_modification_date = UTC_TIMESTAMP(); 
                END"
            );
            return $trigger;
        }
    ]
];
