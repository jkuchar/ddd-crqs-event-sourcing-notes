# Event-Sourcing basic example app

Aim: learn basics of event-sourcing pattern and its caveats.

This project builds on example from presentation from [Mathias Verraes - Practical Event Sourcing](http://verraes.net/2014/03/practical-event-sourcing/).
 
### Event Sourcing / DDD / CQRS

- https://www.youtube.com/watch?v=whCk1Q87_ZI
- https://www.youtube.com/watch?v=KXqrBySgX-s
- https://gist.github.com/SzymonPobiega/5220595
- https://cqrs.files.wordpress.com/2010/11/cqrs_documents.pdf
- http://subscriptions.viddler.com/GregYoung
- http://verraes.net/2014/11/domain-events/
- https://www.youtube.com/watch?v=pL9XeNjy_z4

### Message Buses

- http://getprooph.org/ (cool one!)
  - super flexible
  - well designed
  - support for snapshotting
  - [ ] unfortunately does not support Sagas yet! (contribution?)
  - [ ] up-casting is strange: why it is not JIT up-cast? http://getprooph.org/event-store/upcasting.html
  - [ ] Nested transaction? http://getprooph.org/event-store-bus-bridge/transaction_manager.html
- https://github.com/qandidate-labs/broadway
  - looks like not that good architecture, feature richer
  - more like a framework then library
 
### Sagas
- http://blog.jonathanoliver.com/cqrs-sagas-with-event-sourcing-part-i-of-ii/
- http://blog.jonathanoliver.com/cqrs-sagas-with-event-sourcing-part-ii-of-ii/
- http://blog.jonathanoliver.com/sagas-event-sourcing-and-failed-commands/
- http://udidahan.com/2009/04/20/saga-persistence-and-event-driven-architectures/

### Examples
- http://buttercup-php.github.io/protects/


## Notes / TODOs

- [ ] How to make proper relation between Product and Basket?
- [ ] How to access product name when product-related event occurs - aggregate does not expose any state?! (should I access read model from write model?)
- [ ] If aggregate produces event but it does not change state in any way, should it have empty apply() method for this event or should framework just skip this event. (this can lead into hard discoverable typo errors)
- [ ] Is there any point of adding events when loading from history into object "recoded events"?

## Case studies

- https://drive.google.com/file/d/0B_enB2DMKeyzbF96VjdKdjIzOHc/view