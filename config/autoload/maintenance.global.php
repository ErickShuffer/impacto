<?php

return array(
    'tteMaintenance' => array(
        /**
         * Global Configuration for tteMaintenance Module
         */
        'global' => array(
            /**
             * Closure or MaintenanceProviderInterface to dynamically define a maintenance
             *
             * @var Closure|\tteMaintenance\Provider\MaintenanceProviderInterface
             */
            'maintenanceProvider' => array(
                // Add here provider, which define the system state.

        //      'tteMaintenance\Provider\TimeSpanFactory',
              'tteMaintenance\Provider\ManualFactory',
        //      'tteMaintenance\Provider\JsonFileFactory',
            ),

            /**
             * Route or file to redirect the user to an Error page
             *
             * @var string
             */
            'redirect' => 'offline.html',

            /**
             * What type of redirect?
             *
             * @var string
             */
            'redirectType' => \tteMaintenance\Provider\AbstractProvider::REDIRECT_TYPE_FILE,
        ),

        /**
         * Configuration for TimeSpanProvider
         *
         * @var array
         */
        'timeSpan' => array(
            /**
             * Defines the begin of the daley maintenance
             *
             * @var Int
             */
            'start' => 0,

            /**
             * Defines the end of the daley maintenance
             *
             * @var Int
             */
            'end' => 0,
        ),

        /**
         * Configuration to define manually when the system under maintenance
         */
        'manual' => array(
            /**
             * Manually define, when the system is under maintenance
             *
             * @var bool
             */
            'isMaintenance' => false,
        ),
        /**
         *
         */
        'jsonFile' => array(

            /**
             * If the "StrictMode" is disabled when an error occurs the system will be not go into the maintenance mode.
             * An error may be that the file or the property is not found.
             *
             * @var bool
             */
            'strictMode' => true,

            /**
             * Json File with information if the system is under maintenance
             *
             * @var string
             */
            'targetFile' => '',

            /**
             * Where the Provider looks to determine if the Value is true or false
             *
             * @var string
             *             */
            'propertyName' => '',
        ),
    ),
);