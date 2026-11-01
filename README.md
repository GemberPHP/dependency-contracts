# 🫚 Gember Event Sourcing: Dependency contracts
[![Build Status](https://github.com/GemberPHP/dependency-contracts/actions/workflows/test.yaml/badge.svg?branch=main)](https://github.com/GemberPHP/dependency-contracts/actions/workflows/test.yaml)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](LICENSE)
[![PHP Version](https://img.shields.io/badge/php-%5E8.3-8892BF.svg?style=flat)](http://www.php.net)

Dependency contracts for [gember/event-sourcing](https://github.com/GemberPHP/event-sourcing).

These interfaces are implemented by the adapter packages, and can be implemented for other vendors:

| Contract | Implemented by |
|----------|----------------|
| `EventStore\Rdbms\RdbmsEventStoreRepository` | [gember/rdbms-event-store-doctrine-dbal](https://github.com/GemberPHP/rdbms-event-store-doctrine-dbal) |
| `EventStore\Saga\RdbmsSagaStoreRepository` | [gember/rdbms-event-store-doctrine-dbal](https://github.com/GemberPHP/rdbms-event-store-doctrine-dbal) |
| `EventStore\Snapshot\RdbmsSnapshotStoreRepository` | [gember/rdbms-event-store-doctrine-dbal](https://github.com/GemberPHP/rdbms-event-store-doctrine-dbal) |
| `Outbox\Rdbms\RdbmsOutboxRepository` | [gember/rdbms-event-store-doctrine-dbal](https://github.com/GemberPHP/rdbms-event-store-doctrine-dbal) |
| `Util\Transaction\Transactional` | [gember/rdbms-event-store-doctrine-dbal](https://github.com/GemberPHP/rdbms-event-store-doctrine-dbal) |
| `Util\Messaging\MessageBus\EventBus`, `CommandBus` | [gember/message-bus-symfony](https://github.com/GemberPHP/message-bus-symfony) |
| `Util\Serialization\Serializer\Serializer` | [gember/serializer-symfony](https://github.com/GemberPHP/serializer-symfony) |
| `Util\Generator\Identity\IdentityGenerator` | [gember/identity-generator-symfony](https://github.com/GemberPHP/identity-generator-symfony) |

All contracts are in the `Gember\DependencyContracts` namespace.
