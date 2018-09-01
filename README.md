# Event-Sourcing basic example app

Aim: learn basics of event sourcing pattern and its caveats.

This project builds on an example from the presentation from [Mathias Verraes - Practical Event Sourcing](http://verraes.net/2014/03/practical-event-sourcing/).





# Learning DDD (Domain Driven Design)

Bellow is learning material that I have used to dive into event DDD (and its implementations) deeper.

## The Strategic Design

I have put DDD in its own section because DDD is more an analysis process than a collection of structural patterns.

- [Eric Evans: InfoQ: Strategic Design](https://www.infoq.com/presentations/strategic-design-evans) (Flash needed)
- [book: Eric Evans: Domain-Driven Design - Tacking Complexity in the Heart of Software](https://www.amazon.com/Domain-Driven-Design-Tackling-Complexity-Software/dp/0321125215) (book; read especially bounded context capture)
  - [Eric Evans](https://dddeurope.com/2017/speakers/eric-evans/): [Tackling Complexity in the Heart of Software](https://www.youtube.com/watch?v=dnUFEg68ESM) (10 years later; explains how to read his book) [DDD Europe 2016](https://www.youtube.com/playlist?list=PLf9p-N3ltMTttHHPbCJ0NpD-D50Qpam7z)
  - [Eric Evans](https://dddeurope.com/2017/speakers/eric-evans/): [Good Design is Imperfect Design](https://www.youtube.com/watch?v=lY54TmmEllY) (the big thing; lot of very good observations) [DDD Europe 2017](https://www.youtube.com/playlist?list=PLf9p-N3ltMTtAhyGupYWGVPpxUqrgsXgs)
  - [David West](https://dddeurope.com/2017/speakers/david-west/): [The Past and Future of Domain-Driven Design](https://www.youtube.com/watch?v=XH_awPS6hK4) (How computing evolved into what it is now; very interesting)
- [Greg Young: Bounded Contexts](https://www.youtube.com/watch?v=KXqrBySgX-s) (great one!)
- [Jimmy Bogard: Domain Driven Design: The Good Parts](https://www.youtube.com/watch?v=U6CeaA-Phqo)
- [Jimmy Bogard: Crafting Wicked Domain Models](https://vimeo.com/43598193)
- [Greg Young: A Decade of DDD, CQRS, Event Sourcing](https://www.youtube.com/watch?v=LDW0QWie21s) DDD Europe 2016

## Case studies

- [Lufthansa case study](https://drive.google.com/file/d/0B_enB2DMKeyzbF96VjdKdjIzOHc/view)






# The Technical Stuff

This section describes how people are **implementing** their domains. **Be careful. Always make sure you know why author of talk decided to do his thing that way.**

Cannot stress enough that DDD does NOT have just a technical part. It is more style of thinking that you need to learn by shifting you mind. (see the first section of this document)

## Keep it simple

- [Greg Young: Keynote: 8 Lines of Code](https://www.infoq.com/presentations/8-lines-code-refactoring)

## Event Sourcing + CQRS

An alternative implementation of domain model persistence layer which stores a complete history of all events that happened in the domain in the past.

- [lightning talk: Mountain West Rubyconf 2010 - Alistair Cockburn - CQRS](https://www.youtube.com/watch?v=9kQ2veoeWZM)

- [Eric Evans Interviews Greg Young on the Architecture of a Large Transaction System](https://www.infoq.com/interviews/Architecture-Eric-Evans-Interviews-Greg-Young) (probably the first interview on event sourcing)
- [Greg Young's Event sourcing class](https://www.youtube.com/watch?v=whCk1Q87_ZI) + [Greg Yong's CQRS documents (circa overview of course)](https://cqrs.files.wordpress.com/2010/11/cqrs_documents.pdf)
- [Querying Event Streams](https://www.youtube.com/watch?v=DWhQggR13u8) (wow!)
- [SzymonPobiega's DDD reading list](https://gist.github.com/SzymonPobiega/5220595)
- [Greg Young's full and up-to-date DDD/CQRS/EventSourcing class](http://subscriptions.viddler.com/GregYoung)
- [Mathias Verraes' elaborate on domain events](http://verraes.net/2014/11/domain-events/) - *Domain Events allow you to segregate the models of different systems*
- [unknown's Domain Driven Design Through Onion *Architecture*](https://www.youtube.com/watch?v=pL9XeNjy_z4)

- [CQRS.nu](http://cqrs.nu/)
- [DDD Community](http://dddcommunity.org/)

- *Tip:* Try to watch some microservices/stream processing videos. There are surprising similarities.

### (The structural part of) DDD in PHP

- William Durand: DDD with Symfony2:
  - [Folder Structure And Code First](http://williamdurand.fr/2013/08/07/ddd-with-symfony2-folder-structure-and-code-first/)
  - [Making Things Clear](http://williamdurand.fr/2013/08/20/ddd-with-symfony2-making-things-clear/)
  - [Basic Persistence & Testing](http://williamdurand.fr/2013/11/13/ddd-with-symfony2-basic-persistence-and-testing/)
- [Jan Kuchar's second sandbox](https://gitlab.grifart.cz/jkuchar1/thesis-example-application)
- [DDDinPHP](http://dddinphp.org/)
- [Cargo example in PHP from Eric Evans blue book](https://github.com/codeliner/php-ddd-cargo-sample)


### Message Buses/libraries

- [Prooph](http://getprooph.org/) (cool one!)
  - super flexible
  - library: the ability to mix&match
  - well designed
  - support for snapshotting
  - [ ] unfortunately does not support Sagas yet! (contribution?)
  - [ ] up-casting is strange: why it is not JIT up-cast? http://getprooph.org/event-store/upcasting.html
  - [ ] Nested transaction? http://getprooph.org/event-store-bus-bridge/transaction_manager.html
- [broadway](https://github.com/qandidate-labs/broadway)
  - feature richer
  - you have to use all (single package)
  - more like a framework than library (overkill?)
  - looks like a some's project by product
  - experimental support for process managers
- [Predaddy](https://github.com/szjani/predaddy)
- [EventCentric.Core](https://github.com/event-centric/EventCentric.Core)
- [litecqrs-php](https://github.com/beberlei/litecqrs-php)
- [Buttercup.Protects](http://buttercup-php.github.io/protects/) - A PHP library for building Aggregates that protect business invariants, and that record Domain Events.
    - Nice explanation of event-sourcing principles on a richly commented simple example code.
 
### Process Managers / Sagas (the same thing!)
- Jonathan Oliver: Sagas with Event Sourcing - [first part](http://blog.jonathanoliver.com/cqrs-sagas-with-event-sourcing-part-i-of-ii/), [second part](http://blog.jonathanoliver.com/cqrs-sagas-with-event-sourcing-part-ii-of-ii/)
- Jonathan Oliver: [Sagas, Event Sourcing, and Failed Commands](http://blog.jonathanoliver.com/sagas-event-sourcing-and-failed-commands/)
- Udi Dahan: [Saga Persistence and Event-Driven Architectures](http://udidahan.com/2009/04/20/saga-persistence-and-event-driven-architectures/)

### Examples
- Mathias Verraes: [Buttercup.Protects](http://buttercup-php.github.io/protects/) is a PHP library for building Aggregates that protect business invariants, and that record Domain Events.
- [EventSourcing at BlaBlaCar](http://blablatech.com/blog/micro-service-at-blablacar) + Matthieu Moquet: [CQRS & Event Sourcing](https://speakerdeck.com/mattketmo/cqrs-and-event-sourcing)
- [GitHub: example applications written with CQRS/event sourcing pattern](https://github.com/dddinphp)

### Notes / TODOs

- [x] How to make a proper relation between Product and Basket?
  - **Answer:** Analyse bounded contexts. (probably in most domains use two separate AggregateRoots)
- [x] How to access product name when product-related event occurs - aggregate does not expose any state?! (should I access read model from write model?)
  - **Answer:** Access read side if needed or use heavy events.
- [x] If aggregate produces event but it does not change state in any way, should it have empty apply() method for this event or should framework just skip this event. (this can lead into hard discoverable typo errors)
  - **Answer:** I would prefer to hot have this methods in aggregate and have some kind of static analysis check for method name and type consistency (in PHP which does not support method overloading).
- [x] Is there any point of adding events when loading from history into the object "recorded events"?
  - **Answer:** No, if you load them there, they will be persisted once more and there will be a need for merge process.

