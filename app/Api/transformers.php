<?php

// Bind API Transformers
API::transform('Api\Models\Business', 'Api\Transformers\BusinessTransformer');
API::transform('Api\Models\Category', 'Api\Transformers\CategoryTransformer');
API::transform('Api\Models\User', 'Api\Transformers\UserTransformer');
API::transform('Api\Models\Proposal', 'Api\Transformers\ProposalTransformer');