# Event-Sourcing basic example app

Aim: learn basics of event-sourcing pattern and its caveats.

This project builds on example from presentation from [Mathias Verraes - Practical Event Sourcing](http://verraes.net/2014/03/practical-event-sourcing/).
 
### Event Sourcing / DDD / CQRS

- [Greg Young's Event sourcing class](https://www.youtube.com/watch?v=whCk1Q87_ZI) + [Greg Yong's CQRS documents (circa overview of course)](https://cqrs.files.wordpress.com/2010/11/cqrs_documents.pdf)
- [Greg Young's hi-level overview of CQRS/DDD](https://www.youtube.com/watch?v=KXqrBySgX-s)
- [Querying Event Streams](https://www.youtube.com/watch?v=DWhQggR13u8) (wow!)
- [SzymonPobiega's DDD reading list](https://gist.github.com/SzymonPobiega/5220595)
- [Greg Young's full and up-to-date DDD/CQRS/EventSourcing class](http://subscriptions.viddler.com/GregYoung)
- [Mathias Verraes' elaborate on domain events](http://verraes.net/2014/11/domain-events/) - *Domain Events allow you to segregate the models of different systems*
- [unknown's Domain Driven Design Through Onion *Architecture*](https://www.youtube.com/watch?v=pL9XeNjy_z4)
- [CQRS.nu](http://cqrs.nu/)
- [DDD Community](http://dddcommunity.org/)

### DDD in PHP
- William Durand: DDD with Symfony2:
  - [Folder Structure And Code First](http://williamdurand.fr/2013/08/07/ddd-with-symfony2-folder-structure-and-code-first/)
  - [Making Things Clear](http://williamdurand.fr/2013/08/20/ddd-with-symfony2-making-things-clear/)
  - [Basic Persistence & Testing](http://williamdurand.fr/2013/11/13/ddd-with-symfony2-basic-persistence-and-testing/)
- [Jan Kuchar's second sanbox](https://gitlab.grifart.cz/jkuchar1/thesis-example-application)
- [DDDinPHP](http://dddinphp.org/)

### Message Buses / libraries

- [Prooph](http://getprooph.org/) (cool one!)
  - super flexible
  - library: ability to mix&match
  - well designed
  - support for snapshotting
  - [ ] unfortunately does not support Sagas yet! (contribution?)
  - [ ] up-casting is strange: why it is not JIT up-cast? http://getprooph.org/event-store/upcasting.html
  - [ ] Nested transaction? http://getprooph.org/event-store-bus-bridge/transaction_manager.html
- [broadway](https://github.com/qandidate-labs/broadway)
  - looks like not that good architecture, feature richer
  - more like a framework then library (overkill?)
  - looks like a some's project by product
- [Predaddy](https://github.com/szjani/predaddy)
- [EventCentric.Core](https://github.com/event-centric/EventCentric.Core)
- [litecqrs-php](https://github.com/beberlei/litecqrs-php)
 
### Process Managers / Sagas (the same thing!)
- Jonathan Oliver: Sagas with Event Sourcing - [first part](http://blog.jonathanoliver.com/cqrs-sagas-with-event-sourcing-part-i-of-ii/), [second part](http://blog.jonathanoliver.com/cqrs-sagas-with-event-sourcing-part-ii-of-ii/)
- Jonathan Oliver: [Sagas, Event Sourcing, and Failed Commands](http://blog.jonathanoliver.com/sagas-event-sourcing-and-failed-commands/)
- Udi Dahan: [Saga Persistence and Event-Driven Architectures](http://udidahan.com/2009/04/20/saga-persistence-and-event-driven-architectures/)

### Examples
- Mathias Verraes: [Buttercup.Protects](http://buttercup-php.github.io/protects/) is a PHP library for building Aggregates that protect business invariants, and that record Domain Events.
- [EventSourcing at BlaBlaCar](http://blablatech.com/blog/micro-service-at-blablacar) + Matthieu Moquet: [CQRS & Event Sourcing](https://speakerdeck.com/mattketmo/cqrs-and-event-sourcing)
- [GitHub: example applications written with CQRS/event sourcing pattern](https://github.com/dddinphp)

## Notes / TODOs

- [ ] How to make proper relation between Product and Basket?
- [ ] How to access product name when product-related event occurs - aggregate does not expose any state?! (should I access read model from write model?)
- [ ] If aggregate produces event but it does not change state in any way, should it have empty apply() method for this event or should framework just skip this event. (this can lead into hard discoverable typo errors)
- [ ] Is there any point of adding events when loading from history into object "recoded events"?

## Case studies

- [Lufthansa case study](https://drive.google.com/file/d/0B_enB2DMKeyzbF96VjdKdjIzOHc/view)