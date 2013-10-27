--TEST--
SolrClient::addDocument() - SOLR 4.0 update="add"|"set"|"inc" - for atomic updating and adding of fields
--FILE--
<?php
# http://wiki.apache.org/solr/UpdateXmlMessages#Optional_attributes_for_.22field.22

require_once "bootstrap.inc";

$doc = new SolrInputDocument();

$doc->addField('id', 1123, 1.1, "inc");
//$doc->addField('id2', 1123, 1.3, null); // segfault now
//$doc->addField('id3', 1123); // segfault now

echo 'FieldModifier id: ';
var_dump($doc->getFieldModifier('id'));

echo 'FieldModifier id2: ';
var_dump($doc->getFieldModifier('id2'));

echo 'FieldModifier id3: ';
var_dump($doc->getFieldModifier('id3'));

echo 'FieldModifier nofield: ';
var_dump($doc->getFieldModifier('nofield'));

print_r($doc->toArray());

?>
--EXPECT--
FieldModifier id: string(3) "inc"
FieldModifier id2: bool(false)
FieldModifier id3: bool(false)
FieldModifier nofield: bool(false)
Array
(
    [document_boost] => 0
    [field_count] => 1
    [fields] => Array
        (
            [0] => SolrDocumentField Object
                (
                    [name] => id
                    [boost] => 1.1
                    [update] => inc
                    [values] => Array
                        (
                            [0] => 1123
                        )

                )

        )

)
