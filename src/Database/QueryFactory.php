<?php

namespace Bulk\Database;

class QueryFactory {

    use QueryFactory\prepare_select,
        QueryFactory\prepare_insert;
}
