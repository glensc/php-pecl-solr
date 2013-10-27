--TEST--
SolrClient::addDocument() - SOLR 4.0 update="add"|"set"|"inc" - for atomic updating and adding of fields
--FILE--
<?php
# http://wiki.apache.org/solr/UpdateXmlMessages#Optional_attributes_for_.22field.22

require_once "bootstrap.inc";

$doc = new SolrInputDocument();

$doc->addField('id', 1123, 1.1, "inc");

print_r($doc->toArray());

?>
--EXPECT--
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
                    [values] => Array
                        (
                            [0] => 1123
                        )

                )

        )

)
